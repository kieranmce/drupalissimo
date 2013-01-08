<?php
/**
 * @file
 * feature_core.features.filter.inc
 */

/**
 * Implements hook_filter_default_formats().
 */
function feature_core_filter_default_formats() {
  $formats = array();

  // Exported format: Rich text.
  $formats['core_rich_text'] = array(
    'format' => 'core_rich_text',
    'name' => 'Rich text',
    'cache' => '1',
    'status' => '1',
    'weight' => '0',
    'filters' => array(
      'filter_markdown' => array(
        'weight' => '-47',
        'status' => '1',
        'settings' => array(),
      ),
      'filter_url' => array(
        'weight' => '-46',
        'status' => '1',
        'settings' => array(
          'filter_url_length' => '72',
        ),
      ),
      'filter_autop' => array(
        'weight' => '-45',
        'status' => '1',
        'settings' => array(),
      ),
      'filter_htmlcorrector' => array(
        'weight' => '-43',
        'status' => '1',
        'settings' => array(),
      ),
    ),
  );

  return $formats;
}
