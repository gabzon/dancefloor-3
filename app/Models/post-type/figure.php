<?php
if ( ! function_exists('figure_post_type') ) {

  // Register Custom Post Type
  function figure_post_type() {

    $labels = array(
      'name'                  => _x( 'Figures', 'Post Type General Name', 'sage' ),
      'singular_name'         => _x( 'Figure', 'Post Type Singular Name', 'sage' ),
      'menu_name'             => __( 'Figures', 'sage' ),
      'name_admin_bar'        => __( 'Figures', 'sage' ),
      'archives'              => __( 'Figure Archives', 'sage' ),
      'attributes'            => __( 'Figure Attributes', 'sage' ),
      'parent_item_colon'     => __( 'Parent Figure:', 'sage' ),
      'all_items'             => __( 'All Figures', 'sage' ),
      'add_new_item'          => __( 'Add New Figure', 'sage' ),
      'add_new'               => __( 'Add New', 'sage' ),
      'new_item'              => __( 'New Figure', 'sage' ),
      'edit_item'             => __( 'Edit Figure', 'sage' ),
      'update_item'           => __( 'Update Figure', 'sage' ),
      'view_item'             => __( 'View Figure', 'sage' ),
      'view_items'            => __( 'View Figures', 'sage' ),
      'search_items'          => __( 'Search Figure', 'sage' ),
      'not_found'             => __( 'Not found', 'sage' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
      'featured_image'        => __( 'Featured Image', 'sage' ),
      'set_featured_image'    => __( 'Set featured image', 'sage' ),
      'remove_featured_image' => __( 'Remove featured image', 'sage' ),
      'use_featured_image'    => __( 'Use as featured image', 'sage' ),
      'insert_into_item'      => __( 'Insert into Figure', 'sage' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Figure', 'sage' ),
      'items_list'            => __( 'Figures list', 'sage' ),
      'items_list_navigation' => __( 'Figures list navigation', 'sage' ),
      'filter_items_list'     => __( 'Filter Figures list', 'sage' ),
    );
    $args = array(
      'label'                 => __( 'Figure', 'sage' ),
      'description'           => __( 'List of figures, moves, techniques for dancing afro-latin music', 'sage' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies'            => array( 'category', 'post_tag', 'style', 'level' ),
      'hierarchical'          => true,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-image-filter',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'show_in_rest'          => true,
    );
    register_post_type( 'figure', $args );
    /* Flush rewrite rules for custom post types. */
    add_action( 'after_switch_theme', 'flush_rewrite_rules' );
  }
  add_action( 'init', 'figure_post_type', 0 );
}
?>
