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
  $context->name = 'core-front';
  $context->description = '';
  $context->tag = 'Frontpage';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '<front>' => '<front>',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-spotlight-block' => array(
          'module' => 'views',
          'delta' => 'spotlight-block',
          'region' => 'content',
          'weight' => '-10',
        ),
        'views-news-block' => array(
          'module' => 'views',
          'delta' => 'news-block',
          'region' => 'content',
          'weight' => '-9',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Frontpage');
  $export['core-front'] = $context;

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'core-sitewide';
  $context->description = '';
  $context->tag = 'Sitewide';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '~admin' => '~admin',
        '~admin/*' => '~admin/*',
        '~node/*/edit' => '~node/*/edit',
        '~node/add/*' => '~node/add/*',
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
          'weight' => '-16',
        ),
      ),
      'layout' => 'left_sidebar',
    ),
    'theme_regions' => array(
      'region_branding' => '',
      'region_content' => 'size-70',
      'region_featured' => '',
      'region_help' => '',
      'region_left' => 'size-30',
      'region_page_top' => '',
      'region_page_bottom' => '',
      'region_right' => '',
    ),
  );
  $context->condition_mode = 1;

  // Translatables
  // Included for use with string extractors like potx.
  t('Sitewide');
  $export['core-sitewide'] = $context;

  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'side-blocks';
  $context->description = '';
  $context->tag = 'Sitewide';
  $context->conditions = array();
  $context->reactions = array();
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('Sitewide');
  $export['side-blocks'] = $context;

  return $export;
}
