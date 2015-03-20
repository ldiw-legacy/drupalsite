<?php

/**
 * Implementation of hook_user_default_permissions().
 */
function ldiw_cleanup_projects_database_user_default_permissions() {
  $permissions = array();

  // Exported permission: create cleanup_project content
  $permissions['create cleanup_project content'] = array(
    'name' => 'create cleanup_project content',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  // Exported permission: delete any cleanup_project content
  $permissions['delete any cleanup_project content'] = array(
    'name' => 'delete any cleanup_project content',
    'roles' => array(),
  );

  // Exported permission: delete own cleanup_project content
  $permissions['delete own cleanup_project content'] = array(
    'name' => 'delete own cleanup_project content',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  // Exported permission: edit any cleanup_project content
  $permissions['edit any cleanup_project content'] = array(
    'name' => 'edit any cleanup_project content',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_cleanup_date
  $permissions['edit field_cleanup_date'] = array(
    'name' => 'edit field_cleanup_date',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_country_code
  $permissions['edit field_country_code'] = array(
    'name' => 'edit field_country_code',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_location_wkt
  $permissions['edit field_location_wkt'] = array(
    'name' => 'edit field_location_wkt',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_nr_of_volunteers
  $permissions['edit field_nr_of_volunteers'] = array(
    'name' => 'edit field_nr_of_volunteers',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_region
  $permissions['edit field_region'] = array(
    'name' => 'edit field_region',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit field_url
  $permissions['edit field_url'] = array(
    'name' => 'edit field_url',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: edit own cleanup_project content
  $permissions['edit own cleanup_project content'] = array(
    'name' => 'edit own cleanup_project content',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  // Exported permission: view field_cleanup_date
  $permissions['view field_cleanup_date'] = array(
    'name' => 'view field_cleanup_date',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: view field_country_code
  $permissions['view field_country_code'] = array(
    'name' => 'view field_country_code',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: view field_location_wkt
  $permissions['view field_location_wkt'] = array(
    'name' => 'view field_location_wkt',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: view field_nr_of_volunteers
  $permissions['view field_nr_of_volunteers'] = array(
    'name' => 'view field_nr_of_volunteers',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: view field_region
  $permissions['view field_region'] = array(
    'name' => 'view field_region',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  // Exported permission: view field_url
  $permissions['view field_url'] = array(
    'name' => 'view field_url',
    'roles' => array(
      '0' => 'anonymous user',
      '1' => 'authenticated user',
    ),
  );

  return $permissions;
}
