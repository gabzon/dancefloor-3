<?php

if ( ! function_exists('course_post_type') ) {
  function custom_post_type_course() {
    $labels = array(
      'name'                  => _x( 'Course', 'Post Type General Name', 'sage' ),
      'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'sage' ),
      'menu_name'             => __( 'Courses', 'sage' ),
      'name_admin_bar'        => __( 'Courses', 'sage' ),
      'archives'              => __( 'Course Archives', 'sage' ),
      'attributes'            => __( 'Course Attributes', 'sage' ),
      'parent_item_colon'     => __( 'Parent Course:', 'sage' ),
      'all_items'             => __( 'All Courses', 'sage' ),
      'add_new_item'          => __( 'Add New Course', 'sage' ),
      'add_new'               => __( 'Add New', 'sage' ),
      'new_item'              => __( 'New Course', 'sage' ),
      'edit_item'             => __( 'Edit Course', 'sage' ),
      'update_item'           => __( 'Update Course', 'sage' ),
      'view_item'             => __( 'View Course', 'sage' ),
      'view_items'            => __( 'View Courses', 'sage' ),
      'search_items'          => __( 'Search Course', 'sage' ),
      'not_found'             => __( 'Not found', 'sage' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
      'featured_image'        => __( 'Featured Image', 'sage' ),
      'set_featured_image'    => __( 'Set featured image', 'sage' ),
      'remove_featured_image' => __( 'Remove featured image', 'sage' ),
      'use_featured_image'    => __( 'Use as featured image', 'sage' ),
      'insert_into_item'      => __( 'Insert into Course', 'sage' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Course', 'sage' ),
      'items_list'            => __( 'Courses list', 'sage' ),
      'items_list_navigation' => __( 'Courses list navigation', 'sage' ),
      'filter_items_list'     => __( 'Filter Courses list', 'sage' ),
    );
    $rewrite = array(
      'slug'                  => 'course',
      'with_front'            => true,
      'pages'                 => true,
      'feeds'                 => true,
    );
    $args = array(
      'label'                 => __( 'Course', 'sage' ),
      'description'           => __( 'List of Courses, schedules, styles, description, etc', 'sage' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions','comments' ),
      'taxonomies'            => array( 'category', 'post_tag', 'style', 'level', 'classroom', 'day' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 6,
      'menu_icon'             => 'dashicons-book',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'rewrite'               => $rewrite,
      'show_in_rest'          => true,
      'show_in_graphql'       => true,
      'graphql_single_name'   => 'Course',
      'graphql_plural_name'   => 'Courses',
    );
    register_post_type( 'course', $args );
    add_action( 'after_switch_theme', 'flush_rewrite_rules' );
  }
  add_action( 'init', 'custom_post_type_course' );
}


// if ( ! function_exists('course_post_type') ) {
//
//   // Register Custom Post Type
//   function course_post_type() {
//
//     $labels = array(
//       'name'                  => _x( 'Course', 'Post Type General Name', 'sage' ),
//       'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'sage' ),
//       'menu_name'             => __( 'Courses', 'sage' ),
//       'name_admin_bar'        => __( 'Courses', 'sage' ),
//       'archives'              => __( 'Course Archives', 'sage' ),
//       'attributes'            => __( 'Course Attributes', 'sage' ),
//       'parent_item_colon'     => __( 'Parent Course:', 'sage' ),
//       'all_items'             => __( 'All Courses', 'sage' ),
//       'add_new_item'          => __( 'Add New Course', 'sage' ),
//       'add_new'               => __( 'Add New', 'sage' ),
//       'new_item'              => __( 'New Course', 'sage' ),
//       'edit_item'             => __( 'Edit Course', 'sage' ),
//       'update_item'           => __( 'Update Course', 'sage' ),
//       'view_item'             => __( 'View Course', 'sage' ),
//       'view_items'            => __( 'View Courses', 'sage' ),
//       'search_items'          => __( 'Search Course', 'sage' ),
//       'not_found'             => __( 'Not found', 'sage' ),
//       'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
//       'featured_image'        => __( 'Featured Image', 'sage' ),
//       'set_featured_image'    => __( 'Set featured image', 'sage' ),
//       'remove_featured_image' => __( 'Remove featured image', 'sage' ),
//       'use_featured_image'    => __( 'Use as featured image', 'sage' ),
//       'insert_into_item'      => __( 'Insert into Course', 'sage' ),
//       'uploaded_to_this_item' => __( 'Uploaded to this Course', 'sage' ),
//       'items_list'            => __( 'Courses list', 'sage' ),
//       'items_list_navigation' => __( 'Courses list navigation', 'sage' ),
//       'filter_items_list'     => __( 'Filter Courses list', 'sage' ),
//     );
//     $rewrite = array(
//       'slug'                  => 'course',
//       'with_front'            => true,
//       'pages'                 => true,
//       'feeds'                 => true,
//     );
//     $args = array(
//       'label'                 => __( 'Course', 'sage' ),
//       'description'           => __( 'List of Courses, schedules, styles, description, etc', 'sage' ),
//       'labels'                => $labels,
//       'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions','comments' ),
//       'taxonomies'            => array( 'category', 'post_tag', 'style', 'level', 'classroom', 'day' ),
//       'hierarchical'          => false,
//       'public'                => true,
//       'show_ui'               => true,
//       'show_in_menu'          => true,
//       'menu_position'         => 6,
//       'menu_icon'             => 'dashicons-book',
//       'show_in_admin_bar'     => true,
//       'show_in_nav_menus'     => true,
//       'can_export'            => true,
//       'has_archive'           => true,
//       'exclude_from_search'   => false,
//       'publicly_queryable'    => true,
//       'capability_type'       => 'page',
//       'rewrite'               => $rewrite,
//       'show_in_rest'          => true,
//       'show_in_graphql'       => true,
//       'graphql_single_name'   => 'Course',
//       'graphql_plural_name'   => 'Courses',
//     );
//     register_post_type( 'course', $args );
//     /* Flush rewrite rules for custom post types. */
//     add_action( 'after_switch_theme', 'flush_rewrite_rules' );
//   }
//   add_action( 'init', 'course_post_type', 0 );
// }
