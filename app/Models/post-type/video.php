<?php
if ( ! function_exists('df_videos_post_type') ) {

  // Register Custom Post Type
  function df_videos_post_type() {

    $labels = array(
      'name'                  => _x( 'Videos', 'Post Type General Name', 'sage' ),
      'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'sage' ),
      'menu_name'             => __( 'Videos', 'sage' ),
      'name_admin_bar'        => __( 'Videos', 'sage' ),
      'archives'              => __( 'Video Archives', 'sage' ),
      'attributes'            => __( 'Video Attributes', 'sage' ),
      'parent_item_colon'     => __( 'Parent Video:', 'sage' ),
      'all_items'             => __( 'All Videos', 'sage' ),
      'add_new_item'          => __( 'Add New Video', 'sage' ),
      'add_new'               => __( 'Add New Video', 'sage' ),
      'new_item'              => __( 'New Item Video', 'sage' ),
      'edit_item'             => __( 'Edit Item Video', 'sage' ),
      'update_item'           => __( 'Update Item Video', 'sage' ),
      'view_item'             => __( 'View Video', 'sage' ),
      'view_items'            => __( 'View Videos', 'sage' ),
      'search_items'          => __( 'Search Video', 'sage' ),
      'not_found'             => __( 'Not found', 'sage' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
      'featured_image'        => __( 'Featured Image', 'sage' ),
      'set_featured_image'    => __( 'Set featured image', 'sage' ),
      'remove_featured_image' => __( 'Remove featured image', 'sage' ),
      'use_featured_image'    => __( 'Use as featured image', 'sage' ),
      'insert_into_item'      => __( 'Insert into Video', 'sage' ),
      'uploaded_to_this_item' => __( 'Uploaded to this video', 'sage' ),
      'items_list'            => __( 'Videos list', 'sage' ),
      'items_list_navigation' => __( 'Videos list navigation', 'sage' ),
      'filter_items_list'     => __( 'Filter Videos list', 'sage' ),
    );
    $args = array(
      'label'                 => __( 'Video', 'sage' ),
      'description'           => __( 'List of dancefloor videos', 'sage' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-format-video',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'show_in_rest'          => true,
    );
    register_post_type( 'df_video', $args );
    /* Flush rewrite rules for custom post types. */
    add_action( 'after_switch_theme', 'flush_rewrite_rules' );
  }
  add_action( 'init', 'df_videos_post_type', 0 );

}
