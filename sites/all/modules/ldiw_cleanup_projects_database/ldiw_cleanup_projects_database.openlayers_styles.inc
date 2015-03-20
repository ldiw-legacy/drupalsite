<?php

/**
 * Implementation of hook_openlayers_styles().
 */
function ldiw_cleanup_projects_database_openlayers_styles() {
  $export = array();
  $openlayers_styles = new stdClass;
  $openlayers_styles->disabled = FALSE; /* Edit this to true to make a default openlayers_styles disabled initially */
  $openlayers_styles->api_version = 1;
  $openlayers_styles->name = 'cleanup_project_style';
  $openlayers_styles->title = 'Cleanup project style';
  $openlayers_styles->description = 'Cleanup project style';
  $openlayers_styles->data = array(
    'pointRadius' => '${phpcode_rendered}',
    'fillColor' => '#ff841f',
    'strokeColor' => '#909090',
    'strokeWidth' => 1,
    'fillOpacity' => '${phpcode_2_rendered}',
    'strokeOpacity' => 1,
    'strokeLinecap' => 'round',
    'strokeDashstyle' => 'solid',
    'graphicOpacity' => 1,
    'label' => '${title}',
    'labelAlign' => array(
      'plugin' => 'declutter_labels',
    ),
    'labelXOffset' => array(
      'plugin' => 'declutter_labels',
    ),
    'labelYOffset' => array(
      'plugin' => 'declutter_labels',
    ),
    'fontColor' => '#6b311e',
    'fontWeight' => 'bold',
  );

  $export['cleanup_project_style'] = $openlayers_styles;
  return $export;
}
