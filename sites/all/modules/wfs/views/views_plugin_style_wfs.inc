<?php
// $Id: views_plugin_style_wfs.inc,v 1.6.2.12 2010/05/17 21:37:12 tmcw Exp $

/**
 * @file
 * Extending the view_plugin_style class to provide a wfs view style.
 */
class views_plugin_style_wfs extends views_plugin_style {

  /**
   * Initialize plugin.
   *
   * Set feed image for shared rendering later.
   */
  function init(&$view, &$display, $options = NULL) {
    parent::init($view, $display, $options = NULL);
  }

  /**
   * Provide a form for setting options.
   *
   * @param array $form
   * @param array $form_state
   */
  function options_form(&$form, &$form_state) { 
    parent::options_form($form, $form_state);                  
    $options = parent::option_definition();

    $handlers = $this->display->handler->get_handlers('field');
    if (empty($handlers)) {
      $form['error_markup'] = array(
        '#value' => t('You need at least one field before you can 
        configure your field settings'),
        '#prefix' => '<div class="error form-item description">',
        '#suffix' => '</div>',
      );
    }
    else {
      // Data Source options
      $form['data_source'] = array(
        '#type' => 'fieldset',
        '#tree' => TRUE,
        '#title' => t('Data Source'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
      );
      $form['data_source']['value'] = array(
        '#type' => 'select',
        '#multiple' => TRUE,
        '#title' => t('Map Data Sources'),
        '#description' => t('Choose which sources of data that the map 
          will provide features for.'),
        '#options' => array(
          'latlon' => t('Lat/Lon Fields'),
          'wkt' => t('WKT')),
        '#default_value' => $this->options['data_source']['value'],
      );

      $field_names[$field] = array('' => '--');
      foreach ($handlers as $field => $handler) {
        if ($label = $handler->label()) {
          $field_names[$field] = $label;
        }
        else {
          $field_names[$field] = $handler->ui_name();
        }
      }

      $form['fields'] = array(
        '#type' => 'fieldset',
        '#title' => 'Field usage',
        '#description' => t('Select the fields that contain the latitude,
        longitude and id of each point. 
        Remaining fields will be in the attributes of the point.'),
        '#weight' => -10,
      );

      $form['fields']['id'] = array(
        '#type' => 'select',
        '#title' => t('ID'),
        '#options' => $field_names,
        '#default_value' => $this->options['fields']['id'],
      );

      $form['fields']['longitude'] = array(
        '#type' => 'select',
        '#title' => t('Longitude'),
        '#options' => $field_names,
        '#default_value' => $this->options['fields']['longitude'],
        '#process' => array('views_process_dependency'),
        '#dependency' => array(
          'edit-style-options-data-source-value' => array('latlon'))
      );

      $form['fields']['latitude'] = array(
        '#type' => 'select',
        '#title' => t('Latitude'),
        '#options' => $field_names,
        '#default_value' => $this->options['fields']['latitude'],
        '#process' => array('views_process_dependency'),
        '#dependency' => array(
          'edit-style-options-data-source-value' => array('latlon'))
      );

      $form['fields']['wkt'] = array(
        '#type' => 'select',
        '#title' => t('WKT'),
        '#options' => $field_names,
        '#default_value' => $this->options['fields']['wkt'],
        '#process' => array('views_process_dependency'),
        '#dependency' => array(
          'edit-style-options-data-source-value' => array('wkt'))
      );
    }
  }

  function field_names() {
    return array_keys($this->view->field);
  }

  /**
   * @param $rows the rows of a rendered view
   * @return $points all of the rows in that view which formed
   *  valid coordinates, organized into coordinates and attributes
   */
  function map_rows($rows) {
    // Fields must be rendered in order as of Views 2.3, 
    // so we will pre-render everything.

    $points = array();

    foreach ($rows as $id => $row) {
      $point = array();
      $point['attr'] = array();

      foreach ($this->view->field as $key => $field) {
        if (isset($this->options['data_source']['value'])) {
          if (current($this->options['data_source']['value']) == 'latlon') {
            if ($key == $this->options['fields']['longitude']) {
              $point['lon'] = $this->get_field($id, $key);
            }
            if ($key == $this->options['fields']['latitude']) {
              $point['lat'] = $this->get_field($id, $key);
            }
          }
          if (current($this->options['data_source']['value']) == 'wkt' &&
            $key == $this->options['fields']['wkt']) {
              $point['wkt'] = $this->get_field($id, $key);
            continue;
          }
        }
        if ($key == $this->options['fields']['id']) {
          $point['id'] = $this->get_field($id, $key);
        }
        $key = ($key == 'name') ? '_name' : $key;
        $value = $this->get_field($id, $key);
        if (isset($value)) {
          $point['attr'][$key] = $value;
        }
      }


      if (!empty($point['lat']) && !empty($point['lon'])) {
        $point['point'] = $point['lon'] . ' ' . $point['lat'];
        unset($point['lat']);
        unset($point['lon']);
        $points[] = $point;
      }

      if (!empty($point['wkt'])) {
        module_load_include('inc', 'wfs', 'includes/gml');
        $point['gml'] = wkt_to_gml($point['wkt']);
        if ($point['gml']) {
          unset($point['wkt']);
          $points[] = $point;
        }
      }
    }
    return $points;
  }
}
