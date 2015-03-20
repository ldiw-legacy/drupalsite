<?php
// $Id: wfs_plugin_display_wfs.inc,v 1.1.2.13 2010/07/19 19:09:05 tmcw Exp $

/**
 * @file
 * Display plugin for WFS
 *
 * @ingroup wfs
 */
class wfs_plugin_display_wfs extends views_plugin_display_feed {
  /**
   * Validate request - this module does not support WFS
   * other than 1.1.0, and will return an XML error otherwise
   */
  private function validate_wfs() {
    if (isset($_GET['version']) && $_GET['version'] != '1.1.0') {
      exit(theme('wfs_exception', 'VersionNegotiationFailed',
        'Drupal WFS only supports WFS 1.1.0'));
    }
  }

  /**
   * Called from the template preprocess
   * response to GetCapabilities
   */
  private function wfs_getcapabilities() {
    $view_url = url(
      $this->view->display[
        $this->view->current_display]->display_options['path'],
      array('absolute' => TRUE));

    drupal_set_header('Content-Type: text/xml');

    echo theme('wfs_getcapabilities', 
      $view_url,
      array(
        array(
          'view_url' => $view_url, 
          'view_name' => $this->view->name, 
          'view_description' => $this->view->description
        )
      ),
      variable_get('site_name', '')
    );
  }

  /**
   * We can't run DescribeFeatureType at this point in the Views build
   * process, but we can make one important optimization: this limits the 
   * query to 1 so that DescribeFeatureType calls are not expensive
   */
  private function wfs_prepare_describefeaturetype() {
    $this->view->pager['items_per_page'] = 1;
  }

  /**
   * response to request=GetFeature call
   */
  private function wfs_prepare_getfeature() {
    if (isset($_GET['outputformat']) && 
      $_GET['outputformat'] != 'text/xml; subtype=gml/3.1.1') {
        exit(theme('wfs_exception', 'NoApplicableCode',
          'Drupal WFS only supports GML 3.1.1'));
      }
  }

  /**
   * try to process filter; this is RISKY
   */
  private function process_filter(&$view, &$display) {
    $post_text = trim(file_get_contents('php://input'));

    // print_r($_GET);
    // GeoServer-style
    if (isset($_GET['filter'])) {
      watchdog('wfs', $_SERVER['REQUEST_URI']);
      // echo urldecode($_GET['filter']);
      $xml = new SimpleXMLElement($_GET['filter']);

        /*
         * on clicks?
        $envelope = $xml->children('http://www.opengis.net/ogc')->And->Intersects->
          children('http://www.opengis.net/gml')->Polygon->exterior->LinearRing->posList
          children('http://www.opengis.net/gml')->Envelope;
         */

      try {
        $envelope = $xml->children('http://www.opengis.net/ogc')->BBOX->
          children('http://www.opengis.net/gml')->Envelope;
      } catch(Exception $e) {
        
      }
    } 
    // OpenLayers-style
    elseif (!empty($post_text)) {
      try {
        libxml_use_internal_errors(true);
        $xml = new SimpleXMLElement(urldecode($post_text));
        libxml_use_internal_errors(false);

        if ($xml) {
          // Variation for OpenLayers-XML
          $envelope = $xml->children('http://www.opengis.net/wfs')->
        	        	Query->children('http://www.opengis.net/ogc')->
        	        	Filter->BBOX->children('http://www.opengis.net/gml')->Envelope;
        }
      } catch(Exception $e) { }
    }

    // Proceed if either style succeeded
    if (!empty($envelope)) {

      $bounding_box = array_merge(
        explode(' ', (string) $envelope->lowerCorner),
        explode(' ', (string) $envelope->upperCorner));

      foreach (array('longitude','latitude') as $idx => $coord) {
        $field = $display->display_options['style_options']['fields'][$coord];
        $table = $view->display['default']->display_options['fields'][$field]['table'];

        $filter = array(
          'operator' => 'between',
          'id' => $field,
          'table' => $table,
          'group' => 0,
          'field' => $view->display['default']->display_options['fields'][$field]['field'],
          'exposed' => NULL,
          'expose' => array(
              'operator' => NULL,
              'label' => NULL
          ),
        
          'relationship' => 'district_id_1',
          'value' => array(
            'value' => '', 
            'min' => $bounding_box[0+$idx],
            'max' => $bounding_box[2+$idx],
            'units' => '',      // Prevent Geo module from converting the values to meters
          )
        );

        if (isset($view->display['default']->display_options['fields'][$field]['function'])) {
          $filter['function'] =
                $view->display['default']->display_options['fields'][$field]['function'];
        }

        $view->display['default']->handler->options['filters'][$field] = $filter;
      }

      // exit(print_r($view,1));
    }
  }

  function init(&$view, &$display, $options = NULL) {
    $_GET = array_change_key_case($_GET, CASE_LOWER);
    $this->process_filter(&$view, &$display);
    parent::init($view, $display, $options);
  }

  /**
   * execute hook - called by the views stack, not by
   * this module.
   *
   * this prints the output rather than returning it
   * because this display plugin is built as an extension to 
   * feed and thus runs through its own theme bits
   */
  function execute() {
    // ensure the case of get parameters
    $this->validate_wfs();
    
    if (isset($_GET['request'])) {
      $req = strtolower($_GET['request']);
      switch ($req) { 
        case 'getcapabilities':
          exit($this->wfs_getcapabilities());
        case 'describefeaturetype':
          $this->wfs_prepare_describefeaturetype();
        case 'getfeature':
          $this->wfs_prepare_getfeature();
      }
    }

    print $this->view->render();
  }
}
