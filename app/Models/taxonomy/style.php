<?php


if ( ! function_exists( 'style' ) ) {

  // Register Custom Taxonomy
  function style() {

    $labels = array(
      'name'                       => _x( 'Styles', 'Taxonomy General Name', 'sage' ),
      'singular_name'              => _x( 'Style', 'Taxonomy Singular Name', 'sage' ),
      'menu_name'                  => __( 'Styles', 'sage' ),
      'all_items'                  => __( 'All Styles', 'sage' ),
      'parent_item'                => __( 'Parent Style', 'sage' ),
      'parent_item_colon'          => __( 'Parent Style:', 'sage' ),
      'new_item_name'              => __( 'New Style Name', 'sage' ),
      'add_new_item'               => __( 'Add New Style', 'sage' ),
      'edit_item'                  => __( 'Edit Style', 'sage' ),
      'update_item'                => __( 'Update Style', 'sage' ),
      'view_item'                  => __( 'View Style', 'sage' ),
      'separate_items_with_commas' => __( 'Separate style with commas', 'sage' ),
      'add_or_remove_items'        => __( 'Add or remove Styles', 'sage' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
      'popular_items'              => __( 'Popular Styles', 'sage' ),
      'search_items'               => __( 'Search Styles', 'sage' ),
      'not_found'                  => __( 'Not Found', 'sage' ),
      'no_terms'                   => __( 'No Styles', 'sage' ),
      'items_list'                 => __( 'Styles list', 'sage' ),
      'items_list_navigation'      => __( 'Styles list navigation', 'sage' ),
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
    register_taxonomy( 'style', array( 'course','post' ), $args );

  }
  add_action( 'init', 'style', 0 );

}
