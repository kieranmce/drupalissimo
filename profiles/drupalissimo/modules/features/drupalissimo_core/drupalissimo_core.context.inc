<?php
/**
 * @file
 * drupalissimo_core.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function drupalissimo_core_context_default_contexts() {
  $export = array();

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'core-sitewide';
  $context->description = '';
  $context->tag = 'Sidewide';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '~admin' => '~admin',
        '~admin/*' => '~admin/*',
      ),
    ),
    'sitewide' => array(
      'values' => array(
        1 => 1,
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'system-main-menu' => array(
          'module' => 'system',
          'delta' => 'main-menu',
          'region' => 'left',
          'weight' => '-10',
        ),
      ),
      'layout' => 'left_sidebar',
    ),
    'theme_regions' => array(
      'region_branding' => '',
      'region_content' => 'size-75',
      'region_featured' => '',
      'region_help' => '',
      'region_left' => 'size-25',
      'region_page_top' => '',
      'region_page_bottom' => '',
      'region_right' => '',
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Sidewide');
  $export['core-sitewide'] = $context;

  return $export;
}