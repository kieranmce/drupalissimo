<?php
/**
 * @file
 * feature_core.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function feature_core_user_default_roles() {
  $roles = array();

  // Exported role: editor.
  $roles['editor'] = array(
    'name' => 'editor',
    'weight' => '2',
  );

  // Exported role: manager.
  $roles['manager'] = array(
    'name' => 'manager',
    'weight' => '3',
  );

  return $roles;
}
