<?php
// $Id: wfs_behavior_virtualhover.inc,v 1.1.2.5 2010/05/17 21:37:12 tmcw Exp $

/**
 * @file
 * Implementation of OpenLayers behavior.
 */

/**
 * Attribution Behavior
 */
class wfs_behavior_virtualhover extends openlayers_behavior {
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
        // TODO: write non-tired
        '#description' => t('Select the layer affected'),
        '#default_value' => isset($defaults['virtuallayer']) ? 
          $defaults['virtuallayer'] : NULL
      ),
    );
  }

  /**
   * Render.
   */
  function render(&$map) {
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/behaviors/js/VirtualHover.js');
    drupal_add_js(drupal_get_path('module', 'wfs') 
      .'/includes/behaviors/js/wfs_behavior_virtualhover.js');
    return $this->options;
  }
}
