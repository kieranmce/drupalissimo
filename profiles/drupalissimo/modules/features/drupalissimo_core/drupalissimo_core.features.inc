<?php
/**
 * @file
 * drupalissimo_core.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function drupalissimo_core_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "context" && $api == "context") {
    return array("version" => "3");
  }
}