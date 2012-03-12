<?php
/**
 * @file
 * drupalissimo_core.strongarm.inc
 */

/**
 * Implements hook_strongarm().
 */
function drupalissimo_core_strongarm() {
  $export = array();

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'admin_theme';
  $strongarm->value = 'rubik';
  $export['admin_theme'] = $strongarm;

  $strongarm = new stdClass;
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'field_bundle_settings';
  $strongarm->value = array(
    'node' => array(
      'news' => array(
        'view_modes' => array(
          'full' => array(
            'custom_settings' => TRUE,
          ),
          'teaser' => array(
            'custom_settings' => TRUE,
          ),
          'core_small_teaser' => array(
            'custom_settings' => TRUE,
          ),
          'spotlight' => array(
            'custom_settings' => TRUE,
          ),
          'rss' => array(
            'custom_settings' => FALSE,
          ),
          'print' => array(
            'custom_settings' => FALSE,
          ),
        ),
        'extra_fields' => array(
          'form' => array(),
          'display' => array(),
        ),
      ),
      'event' => array(
        'view_modes' => array(),
        'extra_fields' => array(
          'form' => array(
            'title' => array(
              'weight' => '-5',
            ),
            'path' => array(
              'weight' => '30',
            ),
          ),
          'display' => array(),
        ),
      ),
    ),
  );
  $export['field_bundle_settings'] = $strongarm;

  return $export;
}
