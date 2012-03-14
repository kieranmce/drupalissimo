<?php

/**
 * Implements hook_form_FORM_ID_alter().
 */
function drupalissimo_form_install_configure_form_alter(&$form, $form_state) {

  $form['site_information']['site_name']['#default_value'] = 'Drupalissimo';
  $form['site_information']['site_mail']['#default_value'] = 'dev@nuvole.org';
  
  $form['admin_account']['account']['name']['#default_value'] = 'admin';
  $form['admin_account']['account']['mail']['#default_value'] = 'dev@nuvole.org';

  $form['update_notifications']['update_status_module']['#default_value'] = array(1 => FALSE, 2 => FALSE);
}

/**
 * Implements hook_install_tasks()
 */
function drupalissimo_install_tasks() {
  return array(
    'drupalissimo_create_terms' => array(
      'display_name' => st('Create taxonomy terms'),
    ),
  );
}

/**
 * Implements hook_install_tasks() callback
 */
function drupalissimo_create_terms() {
  $terms = array();  
  $vocabulary = taxonomy_vocabulary_machine_name_load('category');

  $terms[] = 'Solution';
  $terms[] = 'Client';
  $terms[] = 'Use case';

  foreach ($terms as $name) {
    $term = new stdClass();
    $term->vid = $vocabulary->vid;
    $term->name = $name;
    taxonomy_term_save($term);
  } 
}



