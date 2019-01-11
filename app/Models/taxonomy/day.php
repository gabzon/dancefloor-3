<?php

if ( ! function_exists( 'Day_taxonomy' ) ) {

  // Register Custom Taxonomy
  function Day_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Days', 'Taxonomy General Name', 'sage' ),
      'singular_name'              => _x( 'Day', 'Taxonomy Singular Name', 'sage' ),
      'menu_name'                  => __( 'Days', 'sage' ),
      'all_items'                  => __( 'All Days', 'sage' ),
      'parent_item'                => __( 'Parent Day', 'sage' ),
      'parent_item_colon'          => __( 'Parent Day:', 'sage' ),
      'new_item_name'              => __( 'New Day Name', 'sage' ),
      'add_new_item'               => __( 'Add New Day', 'sage' ),
      'edit_item'                  => __( 'Edit Day', 'sage' ),
      'update_item'                => __( 'Update Day', 'sage' ),
      'view_item'                  => __( 'View Day', 'sage' ),
      'separate_items_with_commas' => __( 'Separate Days with commas', 'sage' ),
      'add_or_remove_items'        => __( 'Add or remove Days', 'sage' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
      'popular_items'              => __( 'Popular Days', 'sage' ),
      'search_items'               => __( 'Search Days', 'sage' ),
      'not_found'                  => __( 'Not Found', 'sage' ),
      'no_terms'                   => __( 'No Days', 'sage' ),
      'items_list'                 => __( 'Days list', 'sage' ),
      'items_list_navigation'      => __( 'Days list navigation', 'sage' ),
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
    register_taxonomy( 'day_of_week', array( 'course' ), $args );

  }
  add_action( 'init', 'Day_taxonomy', 0 );

}
