<?php
// $Id$

// Define plugin for CTools
$plugin=array(
			'title' => t('Declutter Labels style plugin'),
			'description' => t('Declutter Labels style plugin'),
			'style_plugin' => array(
				'class' => 'openlayers_style_plugin_declutter_labels_plugin',
				'parent' => 'openlayers_style_plugin'),
			);

//!!! hook_requirements()'is kontrollida, kas openlayers_style_plugin on olemas

class openlayers_style_plugin_declutter_labels_plugin
										extends openlayers_style_plugin {
	function get_context_properties()
		{
			return array(
				'labelAlign' => 'calc_labelAlign',
				'labelXOffset' => 'calc_labelXOffset',
				'labelYOffset' => 'calc_labelYOffset',
				);
			}

	function render()
		{
			drupal_add_js(drupal_get_path('module','declutter_labels') .
												'/declutter_labels.js');
			}
	}
