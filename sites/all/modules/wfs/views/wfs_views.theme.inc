<?php
// $Id: wfs_views.theme.inc,v 1.6.2.13 2010/07/19 19:09:05 tmcw Exp $

/**
 * @file
 * Theming functions for WFS module views output.
 */

function template_preprocess_views_view_wfs(&$vars) {
  $view = $vars['view'];

  if (isset($_GET['request'])) {
    $req = strtolower($_GET['request']);
    switch ($req) { 
      case 'describefeaturetype':
        wfs_describefeaturetype($view);
    }
  }

  $points = $view->style_plugin->map_rows($vars['rows']);

  $rows = '';
  foreach ($points as $point) {
    if (current($view->style_plugin->options['data_source']['value']) == 'latlon') {
      $rows .= theme('wfs_placemark', $point, $view->name);
    }
    elseif (current($view->style_plugin->options['data_source']['value']) == 'wkt') {
      $rows .= theme('wfs_placemark_geometry', $point, $view->name);
    }
  }

  $vars['rows'] = $rows;
  $vars['viewtitle'] = $view->name;  

  drupal_set_header('Content-Type: text/xml');
}

function wfs_filter_fields($field_names) {
  $fn = array();
  foreach($field_names as $field_name) {
    if ($field_name != 'geometry') {
      $fn[] = $field_name;
    }
  }
  return $fn;
}

/**
 * Called from the template preprocess
 * @param $view the view
 */
function wfs_describefeaturetype($view) {
  // A single view supports a single type, check that this is asking for it.
  if (isset($_GET['typename']) && 
    'drupal:'. $view->name != $_GET['typename']) {
    exit(theme('wfs_exception', 'NoApplicableCode',
      'Could not find type: {'. check_plain($_GET['typename']) .'}'));
  }

  drupal_set_header('Content-Type: text/xml; subtype=gml/3.1.1');
  if (current(
    $view->style_plugin->options['data_source']['value']) == 'latlon') {
    exit(theme('wfs_describefeaturetype',
      $view->name, 
      $view->style_plugin->field_names()));
  }
  elseif (current(
    $view->style_plugin->options['data_source']['value']) == 'wkt') {
    exit(theme('wfs_describefeaturetype_geometry',
      $view->name, 
      wfs_filter_fields($view->style_plugin->field_names())));
  }
}

/**
 * Preprocess for theme('wfs_placemark').
 *
 * TODO: REMOVE
 * @param $vars a single placemark array
 */
function template_preprocess_wfs_placemark(&$vars) {  
  // TODO: don't rename in theme function
  $vars['coords'] = check_plain($vars['point']['point']);
  $vars['attr'] = $vars['point']['attr'];
  $vars['feature_id'] = $vars['point']['id'];
}

function template_preprocess_wfs_placemark_geometry(&$vars) {  
  // TODO: don't rename in theme function
  $vars['gml'] = $vars['point']['gml'];
  $vars['attr'] = $vars['point']['attr'];
  $vars['feature_id'] = $vars['point']['id'];
}
