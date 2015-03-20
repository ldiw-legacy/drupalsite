<?php
// $Id: wfs.views.inc,v 1.1.2.3 2010/04/29 16:16:38 tmcw Exp $

/**
 * @file
 * Views plugins definition for views_wfs
 */

/**
 * Implementation of hook_views_style_plugins(). 
 * Adds view types to views UI interface.
 */
function wfs_views_plugins() {
  return array(
    'module' => 'wfs',
    'display' => array(
      'wfs' => array(
        'title' => t('WFS'),
        'help' => t('WFS'),
        'handler' => 'wfs_plugin_display_wfs',
        'path' => drupal_get_path('module', 'wfs') .'/views',
        'uses hook menu' => TRUE,
        'use ajax' => FALSE,
        'use pager' => FALSE,
        'accept attachments' => FALSE,
        'admin' => t('WFS'),
        'parent' => 'feed'
      ),
    ),
    'style' => array(
      'wfs_feed' => array(
        'title' => t('WFS Feed'),
        'help' => t('Outputs a WFS formatted feed'),
        'handler' => 'views_plugin_style_wfs',
        'theme' => 'views_view_wfs',
        'theme file' => 'wfs_views.theme.inc',
        'theme path' => drupal_get_path('module', 'wfs') .'/views',
        'path' => drupal_get_path('module', 'wfs') .'/views',
        'uses row plugin' => FALSE,
        'uses fields' => TRUE,
        'uses options' => TRUE,
        'uses grouping' => FALSE,
        'type' => 'feed',
      ),
    ),
  );
}
