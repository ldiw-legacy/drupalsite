<?php
// $Id: virtualvector.inc,v 1.1.2.7 2010/05/17 21:37:12 tmcw Exp $

/**
 * @file
 * VirtualVector Layer Type
 */

/**
 * OpenLayers VirtualVector Layer Type class
 */
class wfs_layer_type_virtualvector extends openlayers_layer_type {
  function __construct($layer = array(), $map = array()) {
    parent::__construct($layer, $map);
    if (isset($this->data)) {
      $this->data += $this->options_init();
    }
    else {
      $this->data = $this->options_init();
    }
  }

  /**
   * Provide initial values for options.
   */
  function options_init() {
    return array(
      'layer_type' => 'wfs_virtualvector',
      'layer_handler' => 'wfs_virtualvector',
      'projection' => array('4326', '900913'),
      'baselayer' => FALSE,
      'typeName' => '',
      'formatOptions' => array(
        'extractStyles' => TRUE,
        'extractAttributes' => TRUE,
      ),
    );
  }

  /**
   * Options form which generates layers
   */
  function options_form() {
    return array(
      'url' => array(
        '#type' => 'textfield',
        '#title' => t('URL'),
        '#description' => t('The URL of the WFS server.'),
        '#maxlength' => 1024,
        '#default_value' => isset($this->data['url']) ?
          $this->data['url'] : ''
      ),
      'typeName' => array(
        '#type' => 'textfield',
        '#title' => t('Type Name'),
        '#description' => t('The typename of the features requested.
          In the case of Drupal WFS views, this is the view name.'),
        '#maxlength' => 100,
        '#default_value' => isset($this->data['typeName']) ?
          $this->data['typeName'] : ''
      ),
      'geometryName' => array(
        '#type' => 'textfield',
        '#title' => t('Geometry Name'),
        '#description' => t('The name of the geometry field in the GML
        returned from the WFS layer. For Drupal, this is geometry'),
        '#maxlength' => 100,
        '#default_value' => isset($this->data['geometryName']) ?
          $this->data['geometryName'] : 'geometry'
      ),
      'layer_type' => array(
        '#type' => 'hidden',
        '#value' => 'wfs_layer_type_virtualvector'
      ),
    );
  }

  /**
   * Render.
   */
  function render(&$map) {
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/layer_types/js/VirtualVector.js');
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/layer_types/js/openlayers_virtual_vector.js');
    return $this->options;
  }
}

