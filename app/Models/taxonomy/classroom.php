<?php

if ( ! function_exists( 'Classroom_taxonomy' ) ) {

  // Register Custom Taxonomy
  function Classroom_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Classrooms', 'Taxonomy General Name', 'sage' ),
      'singular_name'              => _x( 'Classroom', 'Taxonomy Singular Name', 'sage' ),
      'menu_name'                  => __( 'Classrooms', 'sage' ),
      'all_items'                  => __( 'All Classrooms', 'sage' ),
      'parent_item'                => __( 'Parent Classroom', 'sage' ),
      'parent_item_colon'          => __( 'Parent Classroom:', 'sage' ),
      'new_item_name'              => __( 'New Classroom Name', 'sage' ),
      'add_new_item'               => __( 'Add New Classroom', 'sage' ),
      'edit_item'                  => __( 'Edit Classroom', 'sage' ),
      'update_item'                => __( 'Update Classroom', 'sage' ),
      'view_item'                  => __( 'View Classroom', 'sage' ),
      'separate_items_with_commas' => __( 'Separate Classrooms with commas', 'sage' ),
      'add_or_remove_items'        => __( 'Add or remove Classrooms', 'sage' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
      'popular_items'              => __( 'Popular Classrooms', 'sage' ),
      'search_items'               => __( 'Search Classrooms', 'sage' ),
      'not_found'                  => __( 'Not Found', 'sage' ),
      'no_terms'                   => __( 'No Classrooms', 'sage' ),
      'items_list'                 => __( 'Classrooms list', 'sage' ),
      'items_list_navigation'      => __( 'Classrooms list navigation', 'sage' ),
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
    register_taxonomy( 'classroom', array( 'course' ), $args );

  }
  add_action( 'init', 'Classroom_taxonomy', 0 );

}
