<?php
// $Id

/**
 * @file
 * Support file for contrib Geo Field module.
 */

/**
 * Implementation of hook_node_import_fields().
 */
function geo_field_node_import_fields($type) {
  $fields = array();

  // Get geo fields for this node type
  foreach (node_import_cck_fields($type, 'geo') as $field => $settings) {
    $cck_field = 'geo:' . $field;

    if ($settings['widget']['type'] == 'geo_latlon') {
      $fields[$cck_field . ':latitude'] = array(
        'title' => t('Latitude'),
        'group' => t('Geo Field'),
      );

      $fields[$cck_field . ':longitude'] = array(
        'title' => t('Longitude'),
        'group' => t('Geo Field'),
      );
    }
    else {
      $fields[$cck_field . ':wkt'] = array(
        'title' => t('Well known text'),
        'group' => t('Geo Field'),
      );
    }
  }
  return $fields;
}

/**
 * Implementation of hook_node_import_values_alter().
 */
function geo_field_node_import_values_alter(&$values, $type, $defaults, $options, $fields, $preview) {
  // Get geo fields for this node type

  foreach (node_import_cck_fields($type, 'geo') as $field => $settings) {  
    $cck_field = 'geo:' . $field;

    if ($settings['widget']['type'] == 'geo_latlon') {
      $value=array(
              'lon' => (float)$values[$cck_field . ':longitude'],
              'lat' => (float)$values[$cck_field . ':latitude']);
      unset($values[$cck_field . ':longitude']);
      unset($values[$cck_field . ':latitude']);
    }
    else {
      $value=$values[$cck_field . ':wkt'];
      unset($values[$cck_field . ':wkt']);
    }

    $values[$field] = array(array('geo' => $value));
  }
}
