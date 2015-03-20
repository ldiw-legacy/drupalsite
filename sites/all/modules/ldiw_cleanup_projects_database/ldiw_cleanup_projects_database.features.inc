<?php

/**
 * Implementation of hook_ctools_plugin_api().
 */
function ldiw_cleanup_projects_database_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "input_formats" && $api == "input_formats") {
    return array("version" => 1);
  }
  elseif ($module == "openlayers" && $api == "openlayers_presets") {
    return array("version" => 1);
  }
  elseif ($module == "openlayers" && $api == "openlayers_styles") {
    return array("version" => 1);
  }
  elseif ($module == "strongarm" && $api == "strongarm") {
    return array("version" => 1);
  }
}

/**
 * Implementation of hook_node_info().
 */
function ldiw_cleanup_projects_database_node_info() {
  $items = array(
    'cleanup_project' => array(
      'name' => t('Cleanup project'),
      'module' => 'features',
      'description' => t('A cleanup project, either already completed (Estonia, Slovenia, ...) or being organised (Brazil, Hungary, ...)'),
      'has_title' => '1',
      'title_label' => t('Name'),
      'has_body' => '1',
      'body_label' => t('Extra information (e.g. e-mail address if cleanup has no website yet)'),
      'min_word_count' => '0',
      'help' => t('Edit this data with care; it will be publicly visible in our Facebook page.'),
    ),
  );
  return $items;
}

/**
 * Implementation of hook_views_api().
 */
function ldiw_cleanup_projects_database_views_api() {
  return array(
    'api' => '2',
  );
}
