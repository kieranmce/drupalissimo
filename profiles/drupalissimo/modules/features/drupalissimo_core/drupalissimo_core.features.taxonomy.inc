<?php
/**
 * @file
 * drupalissimo_core.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function drupalissimo_core_taxonomy_default_vocabularies() {
  return array(
    'category' => array(
      'name' => 'Category',
      'machine_name' => 'category',
      'description' => '',
      'hierarchy' => '0',
      'module' => 'taxonomy',
      'weight' => '0',
    ),
  );
}
