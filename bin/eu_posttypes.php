<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Custom post type - Uppdragstagare
 */
function create_uppdragstagare() {
  $labels = array(
      'name' => 'Uppdragstagare',
      'singular_name' => 'Uppdragstagare',
      'add_new' => 'Lägg till ny Uppdragstagare',
      'add_new_item' => 'Lägg till ny Uppdragstagare',
      'edit_item' => 'Redigera Uppdragstagare',
      'new_item' => 'Ny Uppdragstagare',
      'all_items' => 'Alla Uppdragstagare',
      'view_item' => 'Visa Uppdragstagare',
      'search_items' => 'Sök Uppdragstagare',
      'not_found' => 'Inga Uppdragstagare hittade',
      'not_found_in_trash' => 'Inga Uppdragstagare hittade i soptunnan',
      'parent_item_colon' => '',
      'menu_name' => 'Uppdragstagare'
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'uppdragstagare'),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt') //, 'comments' )
  );
  register_post_type('uppdragstagare', $args);
}

add_action('init', 'create_uppdragstagare');



/**
 *  Add a new taxonomy for post type  "Fyndhyllan" make it hierarchical (like categories)
 */
function create_uppdragstagare_taxonomy() {
  $labels = array(
      'name' => _x('Typ', 'taxonomy general name'),
      'singular_name' => _x('Typ', 'taxonomy singular name'),
      'search_items' => __('Sök Typer'),
      'all_items' => __('Alla Typer'),
      'parent_item' => __('Typ-förälder'),
      'parent_item_colon' => __('Typ-förälder:'),
      'edit_item' => __('Redigera typer'),
      'update_item' => __('Uppdatera typer'),
      'add_new_item' => __('Lägg till ny typ'),
      'new_item_name' => __('Nytt typname'),
      'menu_name' => __('Typer av uppdragstagare')
  );

  $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_tagcloud' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'typ'),
      'capabilities' => array(
          'manage_terms' => 'manage_options', //by default only admin
          'edit_terms' => 'manage_options',
          'delete_terms' => 'manage_options',
          'assign_terms' => 'edit_posts'  // means administrator', 'editor', 'author', 'contributor'
      )
  );
  register_taxonomy('typ', array('uppdragstagare'), $args);
}

add_action('init', 'create_uppdragstagare_taxonomy', 0);




/**
 * Custom post type - Uppdragstagare
 */
function create_litteraturtips() {
  $labels = array(
      'name' => 'Litteraturtips',
      'singular_name' => 'Litteraturtips',
      'add_new' => 'Lägg till nytt litteraturtips',
      'add_new_item' => 'Lägg till nytt litteraturtips',
      'edit_item' => 'Redigera litteraturtips',
      'new_item' => 'Nytt litteraturtips',
      'all_items' => 'Alla litteraturtips',
      'view_item' => 'Visa litteraturtips',
      'search_items' => 'Sök litteraturtips',
      'not_found' => 'Inga litteraturtips hittade',
      'not_found_in_trash' => 'Inga litteraturtips hittade i soptunnan',
      'parent_item_colon' => '',
      'menu_name' => 'Litteraturtips'
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'litteraturtips'),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt') //, 'comments' )
  );
  register_post_type('litteraturtips', $args);
}

add_action('init', 'create_litteraturtips');