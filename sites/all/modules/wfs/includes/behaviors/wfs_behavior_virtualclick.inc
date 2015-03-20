<?php
// $Id: wfs_behavior_virtualclick.inc,v 1.1.2.2 2010/05/17 21:37:12 tmcw Exp $

/**
 * @file
 * Implementation of OpenLayers behavior.
 */

/**
 * Attribution Behavior
 */
class wfs_behavior_virtualclick extends openlayers_behavior {
  /**
   * Provide initial values for options.
   */
  function options_init() {
    return array();
  }

  function options_form($defaults) {
    return array(
      'virtuallayer' => array(
        '#type' => 'select',
        '#options' => $this->map['layers'],
        '#description' => t('Select the layer from which points are 
          pulled. This is likely a VirtualVector layer.'),
        '#default_value' => isset($defaults['virtuallayer']) ? 
          $defaults['virtuallayer'] : NULL
      ),
      'linkas' => array(
        '#type' => 'select',
        '#options' => array('html' => t('html'), 'url' => t('url')),
        '#description' => t('Is the link an HTML link or just a URL?'),
        '#default_value' => isset($defaults['linkas']) ? 
          $defaults['linkas'] : 'html' 
      ),
      'linkattribute' => array(
        '#type' => 'textfield',
        '#description' => t('The attribute of the feature layer
          that contains the url to go to when clicked.'),
        '#default_value' => isset($defaults['linkattribute']) ? 
          $defaults['linkattribute'] : NULL
      ),
    );
  }

  /**
   * Render.
   */
  function render(&$map) {
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/behaviors/js/VirtualClick.js');
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/behaviors/js/wfs_behavior_virtualclick.js');
    return $this->options;
  }
}

