<?php

/**
 * Implementation og hook_theme()
 */
function twist_theme() {
  return array(
    'page_header' => array(
      'variables' => array('vars' => NULL),
      'template' => 'page-header',
      'path' => drupal_get_path('theme', 'twist') .'/templates',
    ),
    'page_footer' => array(
      'variables' => array('vars' => NULL),
      'template' => 'page-footer',
      'path' => drupal_get_path('theme', 'twist') .'/templates',
    ),
  );
}

/**
 * Implements of hook_process_html()
 */
function twist_preprocess_html(&$vars) {
  if (isset($vars['page']['left']) && !empty($vars['page']['left'])) {
    $vars['classes_array'][] = 'sidebar-left';
  }
  if (isset($vars['page']['right']) && !empty($vars['page']['right'])) {
    $vars['classes_array'][] = 'sidebar-right';
  }  
}

/**
 * Implements of hook_preprocess_page()
 */
function twist_preprocess_page(&$vars) {
  $vars['page']['content']['system_main']['#weight'] = 0;
  $vars['page']['content']['#sorted'] = FALSE;
}

/**
 * Implements of hook_process_page()
 */
function twist_process_page(&$vars) {
  _rubik_local_tasks($vars);  
  $vars['page_header'] = theme('page_header', $vars);
  $vars['page_footer'] = theme('page_footer', $vars);
}

/**
 * Implementation of hook_preprocess_node()
 */
function twist_preprocess_node(&$vars) {
  if (!theme_get_setting('node_submitted')) {
    unset($vars['submitted']);
  }
}

/**
 * Override theme('menu_tree')
 */
function twist_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Override theme('menu_link')
 */
function twist_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if (isset($element['#original_link'])) {
    $path = $element['#original_link']['link_path'];
    $element['#attributes']['class'][] = str_replace('/', '-', $path);
  }

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Preprocess.
 */
function twist_preprocess_views_view_unformatted(&$vars) {
  foreach ($vars['classes_array'] as $key => $value) {
    $vars['classes_array'][$key] .= ' clearfix';
  }
}

/**
 * theme('form_element')
 */
function twist_form_element($variables) {
  $element = &$variables['element'];
  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add element #id for #type 'item'.
  if (isset($element['#markup']) && !empty($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  // Add element's #type and #name as class to aid with JS/CSS selectors.
  $attributes['class'] = array('form-item');
  if (!empty($element['#type'])) {
    $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
  }
  if (!empty($element['#name'])) {
    $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
  }
  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }
  $output = '<div' . drupal_attributes($attributes) . '>' . "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description"><div class="description-container"><div class="description-inner">' . $element['#description'] . "</div></div></div>\n";
  }

  $output .= "</div>\n";

  return $output;
}


function twist_text_format_wrapper($variables) {
  $element = $variables['element'];
  $output = '<div class="text-format-wrapper">';
  $output .= $element['#children'];
  if (!empty($element['#description'])) {
    $output .= '<div class="description"><div class="description-container"><div class="description-inner">' . $element['#description'] . "</div></div></div>\n";
  }
  $output .= "</div>\n";

  return $output;
}

function twist_field_multiple_value_form($variables) {
  $element = $variables['element'];
  $output = '';

  if ($element['#cardinality'] > 1 || $element['#cardinality'] == FIELD_CARDINALITY_UNLIMITED) {
    $table_id = drupal_html_id($element['#field_name'] . '_values');
    $order_class = $element['#field_name'] . '-delta-order';
    $required = !empty($element['#required']) ? '<span class="form-required" title="' . t('This field is required. ') . '">*</span>' : '';

    $header = array(
      array(
        'data' => '<label>' . t('!title: !required', array('!title' => $element['#title'], '!required' => $required)) . "</label>",
        'colspan' => 2,
        'class' => array('field-label'),
      ),
      t('Order'),
    );
    $rows = array();

    // Sort items according to '_weight' (needed when the form comes back after
    // preview or failed validation)
    $items = array();
    foreach (element_children($element) as $key) {
      if ($key === 'add_more') {
        $add_more_button = &$element[$key];
      }
      else {
        $items[] = &$element[$key];
      }
    }
    usort($items, '_field_sort_items_value_helper');

    // Add the items as table rows.
    foreach ($items as $key => $item) {
      $item['_weight']['#attributes']['class'] = array($order_class);
      $delta_element = drupal_render($item['_weight']);
      $cells = array(
        array('data' => '', 'class' => array('field-multiple-drag')),
        drupal_render($item),
        array('data' => $delta_element, 'class' => array('delta-order')),
      );
      $rows[] = array(
        'data' => $cells,
        'class' => array('draggable'),
      );
    }

    $output = '<div class="form-item">';
    $output .= theme('table', array('header' => $header, 'rows' => $rows, 'attributes' => array('id' => $table_id, 'class' => array('field-multiple-table'))));
    $output .= '<div class="description"><div class="description-container"><div class="description-inner">' . $element['#description'] . "</div></div></div>\n";
    $output .= '<div class="clearfix">' . drupal_render($add_more_button) . '</div>';
    $output .= '</div>';

    drupal_add_tabledrag($table_id, 'order', 'sibling', $order_class);
  }
  else {
    foreach (element_children($element) as $key) {
      $output .= drupal_render($element[$key]);
    }
  }

  return $output;
}


