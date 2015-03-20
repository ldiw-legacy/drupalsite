<?php

/**
 * Implementation of hook_openlayers_presets().
 */
function ldiw_cleanup_projects_database_openlayers_presets() {
  $export = array();
  $openlayers_presets = new stdClass;
  $openlayers_presets->disabled = FALSE; /* Edit this to true to make a default openlayers_presets disabled initially */
  $openlayers_presets->api_version = 1;
  $openlayers_presets->name = 'cleanups_map';
  $openlayers_presets->title = 'Cleanups Map';
  $openlayers_presets->description = 'Map of LDIW cleanup projects';
  $openlayers_presets->data = array(
    'width' => 'auto',
    'height' => '700px',
    'image_path' => 'http://openlayers.org/api/2.9/img/',
    'css_path' => 'http://openlayers.org/api/2.9/theme/default/style.css',
    'proxy_host' => '',
    'hide_empty_map' => 0,
    'center' => array(
      'initial' => array(
        'centerpoint' => '0, 30',
        'zoom' => '3',
      ),
      'restrict' => array(
        'restrictextent' => 0,
        'restrictedExtent' => '',
      ),
    ),
    'behaviors' => array(
      'openlayers_behavior_attribution' => array(),
      'openlayers_behavior_popup' => array(
        'layers' => array(
          'cleanup_projects_map_openlayers_1' => 'cleanup_projects_map_openlayers_1',
        ),
      ),
      'openlayers_behavior_keyboarddefaults' => array(),
      'openlayers_behavior_navigation' => array(
        'zoomWheelEnabled' => 1,
      ),
      'openlayers_behavior_panzoombar' => array(),
    ),
    'default_layer' => 'google_physical',
    'layers' => array(
      'google_physical' => 'google_physical',
      'cleanup_projects_map_openlayers_1' => 'cleanup_projects_map_openlayers_1',
    ),
    'layer_styles' => array(
      'cleanup_projects_map_openlayers_1' => array(
        'default' => 'cleanup_project_style',
        'select' => 'cleanup_project_style',
        'temporary' => 'cleanup_project_style',
      ),
    ),
    'layer_activated' => array(
      'cleanup_projects_map_openlayers_1' => 'cleanup_projects_map_openlayers_1',
    ),
    'layer_switcher' => array(),
    'projection' => '900913',
    'displayProjection' => '4326',
    'styles' => array(
      'default' => 'default',
      'select' => 'default',
      'temporary' => 'default',
    ),
  );

  $export['cleanups_map'] = $openlayers_presets;
  return $export;
}
