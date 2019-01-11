<?php

if ( ! function_exists( 'Level_taxonomy' ) ) {

  // Register Custom Taxonomy
  function Level_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Levels', 'Taxonomy General Name', 'sage' ),
      'singular_name'              => _x( 'Level', 'Taxonomy Singular Name', 'sage' ),
      'menu_name'                  => __( 'Levels', 'sage' ),
      'all_items'                  => __( 'All Levels', 'sage' ),
      'parent_item'                => __( 'Parent Level', 'sage' ),
      'parent_item_colon'          => __( 'Parent Level:', 'sage' ),
      'new_item_name'              => __( 'New Level Name', 'sage' ),
      'add_new_item'               => __( 'Add New Level', 'sage' ),
      'edit_item'                  => __( 'Edit Level', 'sage' ),
      'update_item'                => __( 'Update Level', 'sage' ),
      'view_item'                  => __( 'View Level', 'sage' ),
      'separate_items_with_commas' => __( 'Separate Levels with commas', 'sage' ),
      'add_or_remove_items'        => __( 'Add or remove Levels', 'sage' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
      'popular_items'              => __( 'Popular Levels', 'sage' ),
      'search_items'               => __( 'Search Levels', 'sage' ),
      'not_found'                  => __( 'Not Found', 'sage' ),
      'no_terms'                   => __( 'No Levels', 'sage' ),
      'items_list'                 => __( 'Levels list', 'sage' ),
      'items_list_navigation'      => __( 'Levels list navigation', 'sage' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'show_in_rest'               => true,
    );
    register_taxonomy( 'level', array( 'course' ), $args );

  }
  add_action( 'init', 'Level_taxonomy', 0 );

}
