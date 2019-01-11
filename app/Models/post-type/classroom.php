<?php

if ( ! function_exists('classroom_post_type') ) {

    function classroom_post_type($post_types){
        $labels = array(
            'name' => __('Classroom', 'sage'),
            'singular_name' => __('Classroom', 'sage'),
            'menu_name' => __('Classrooms', 'sage'),
            'parent_item_colon' => __('Parent Item:', 'sage'),
            'all_items' => __('All Classrooms', 'sage'),
            'view_item' => __('View Classroom', 'sage'),
            'add_new_item' => __('Add New Classroom', 'sage'),
            'add_new' => __('Add New', 'sage'),
            'edit_item' => __('Edit Classroom', 'sage'),
            'update_item' => __('Update Classroom', 'sage'),
            'search_items' => __('Search Classroom', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in Trash', 'sage'),
        );
        $rewrite = array(
            'slug'                  => 'classroom',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['classroom'] = array(
            'label'                 => __( 'Classroom', 'sage' ),
            'description'           => __( 'List of classrooms', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'excerpt', 'revisions'),
            'taxonomies'            => array( 'category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_admin_bar'     => true,
            'show_in_rest'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-location-alt',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'classroom_post_type');
}

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

?>
