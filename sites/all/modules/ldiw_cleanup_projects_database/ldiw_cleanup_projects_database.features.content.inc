<?php

/**
 * Implementation of hook_content_default_fields().
 */
function ldiw_cleanup_projects_database_content_default_fields() {
  $fields = array();

  // Exported field: field_cleanup_date
  $fields['cleanup_project-field_cleanup_date'] = array(
    'field_name' => 'field_cleanup_date',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'token' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'date',
    'required' => '0',
    'multiple' => '0',
    'module' => 'date',
    'active' => '1',
    'granularity' => array(
      'year' => 'year',
      'month' => 'month',
      'day' => 'day',
    ),
    'timezone_db' => '',
    'tz_handling' => 'none',
    'todate' => '',
    'repeat' => 0,
    'repeat_collapsed' => '',
    'default_format' => 'short',
    'widget' => array(
      'default_value' => 'blank',
      'default_value_code' => '',
      'default_value2' => 'same',
      'default_value_code2' => '',
      'input_format' => 'Y-m-d H:i:s',
      'input_format_custom' => '',
      'increment' => 1,
      'text_parts' => array(),
      'year_range' => '-3:+3',
      'label_position' => 'above',
      'label' => 'Cleanup date',
      'weight' => '36',
      'description' => 'Date of cleanup (planned or historical). Start date for multi-day cleanups.',
      'type' => 'date_text',
      'module' => 'date',
    ),
  );

  // Exported field: field_country_code
  $fields['cleanup_project-field_country_code'] = array(
    'field_name' => 'field_country_code',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'text',
    'required' => '1',
    'multiple' => '0',
    'module' => 'text',
    'active' => '1',
    'text_processing' => '0',
    'max_length' => '2',
    'allowed_values' => '',
    'allowed_values_php' => '$ret=array(NULL=>NULL);
foreach (geonames_countries() as $e) {
  $ret[$e[\'iso_alpha2\']]=$e[\'name\'];
  }
return $ret;',
    'widget' => array(
      'default_value' => array(
        '0' => array(
          'value' => '',
        ),
      ),
      'default_value_php' => NULL,
      'label' => 'Country',
      'weight' => '31',
      'description' => '',
      'type' => 'optionwidgets_select',
      'module' => 'optionwidgets',
    ),
  );

  // Exported field: field_location_wkt
  $fields['cleanup_project-field_location_wkt'] = array(
    'field_name' => 'field_location_wkt',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'computed',
    'required' => '1',
    'multiple' => '0',
    'module' => 'computed_field',
    'active' => '1',
    'code' => '$latlon=null;
if (!empty($node->field_region[0][\'value\'])) {
    $res=geonames_query(\'search\',array(\'name\'=>$node->field_region[0][\'value\'],country=>$node->field_country_code[0][\'value\'],\'featureclass\'=>\'a\'),array(\'columns\'=>array(\'lat\',\'lng\')));
    if (isset($res->results)) {
        $latlon=$res->results[0];
        }
    }

if (empty($latlon)) {
    $ci=geonames_countryinfo($node->field_country_code[0][\'value\']);
    $latlon=geonames_query(\'get\',array(\'geonameid\'=>$ci[\'geonameid\']))->results[0];
    }
$node_field[0][\'value\'] = \'POINT(\' . $latlon[\'lng\'] . \' \' . $latlon[\'lat\'] . \')\';',
    'display_format' => '$display = $node_field_item[\'value\'];',
    'store' => 1,
    'data_type' => 'varchar',
    'data_length' => '50',
    'data_not_NULL' => 1,
    'data_default' => '',
    'data_sortable' => 0,
    'widget' => array(
      'default_value' => NULL,
      'default_value_php' => NULL,
      'label' => 'Location WKT',
      'weight' => '35',
      'description' => '',
      'type' => 'computed',
      'module' => 'computed_field',
    ),
  );

  // Exported field: field_nr_of_volunteers
  $fields['cleanup_project-field_nr_of_volunteers'] = array(
    'field_name' => 'field_nr_of_volunteers',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'number_integer',
    'required' => '0',
    'multiple' => '0',
    'module' => 'number',
    'active' => '1',
    'prefix' => '',
    'suffix' => '',
    'min' => '',
    'max' => '100000000',
    'allowed_values' => '',
    'allowed_values_php' => '',
    'widget' => array(
      'default_value' => array(
        '0' => array(
          'value' => '',
          '_error_element' => 'default_value_widget][field_nr_of_volunteers][0][value',
        ),
      ),
      'default_value_php' => NULL,
      'label' => 'Actual number of volunteers',
      'weight' => '32',
      'description' => 'Only for projects that have done a cleanup already',
      'type' => 'number',
      'module' => 'number',
    ),
  );

  // Exported field: field_region
  $fields['cleanup_project-field_region'] = array(
    'field_name' => 'field_region',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'text',
    'required' => '0',
    'multiple' => '0',
    'module' => 'text',
    'active' => '1',
    'text_processing' => '0',
    'max_length' => '50',
    'allowed_values' => '',
    'allowed_values_php' => '',
    'widget' => array(
      'rows' => 5,
      'size' => '60',
      'default_value' => array(
        '0' => array(
          'value' => '',
          '_error_element' => 'default_value_widget][field_region][0][value',
        ),
      ),
      'default_value_php' => NULL,
      'label' => 'Region within the country',
      'weight' => '33',
      'description' => 'Only for projects that are smaller than a country. Specify the city, state or other area where the project operates within the country.',
      'type' => 'text_textfield',
      'module' => 'text',
    ),
  );

  // Exported field: field_url
  $fields['cleanup_project-field_url'] = array(
    'field_name' => 'field_url',
    'type_name' => 'cleanup_project',
    'display_settings' => array(
      'label' => array(
        'format' => 'above',
        'exclude' => 0,
      ),
      'teaser' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      'full' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
      '4' => array(
        'format' => 'default',
        'exclude' => 0,
      ),
    ),
    'widget_active' => '1',
    'type' => 'text',
    'required' => '0',
    'multiple' => '0',
    'module' => 'text',
    'active' => '1',
    'text_processing' => '0',
    'max_length' => '',
    'allowed_values' => '',
    'allowed_values_php' => '',
    'widget' => array(
      'rows' => 5,
      'size' => '60',
      'default_value' => array(
        '0' => array(
          'value' => '',
          '_error_element' => 'default_value_widget][field_url][0][value',
        ),
      ),
      'default_value_php' => NULL,
      'label' => 'Website',
      'weight' => '34',
      'description' => 'Project website URL',
      'type' => 'text_textfield',
      'module' => 'text',
    ),
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Actual number of volunteers');
  t('Cleanup date');
  t('Country');
  t('Location WKT');
  t('Region within the country');
  t('Website');

  return $fields;
}
