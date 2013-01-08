<?php
/**
 * @file
 * feature_core.ds.inc
 */

/**
 * Implements hook_ds_view_modes_info().
 */
function feature_core_ds_view_modes_info() {
  $export = array();

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'core_small_teaser';
  $ds_view_mode->label = 'Small Teaser';
  $ds_view_mode->entities = array(
    'node' => 'node',
    'user' => 'user',
  );
  $export['core_small_teaser'] = $ds_view_mode;

  return $export;
}
