<?php
/**
 * @file
 * feature_core.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function feature_core_user_default_permissions() {
  $permissions = array();

  // Exported permission: access content.
  $permissions['access content'] = array(
    'name' => 'access content',
    'roles' => array(
      0 => 'anonymous user',
      1 => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: use text format core_rich_text.
  $permissions['use text format core_rich_text'] = array(
    'name' => 'use text format core_rich_text',
    'roles' => array(),
    'module' => 'filter',
  );

  return $permissions;
}
