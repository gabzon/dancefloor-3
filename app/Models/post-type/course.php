<?php
if ( ! function_exists('cours_post_type') ) {
    function course_post_type($post_types){
        $labels = array(
            'name' => __('Course', 'sage'),
            'singular_name' => __('Course', 'sage'),
            'menu_name' => __('Courses', 'sage'),
            'parent_item_colon' => __('Parent Item:', 'sage'),
            'all_items' => __('All Courses', 'sage'),
            'view_item' => __('View Course', 'sage'),
            'add_new_item' => __('Add New Course', 'sage'),
            'add_new' => __('Add New', 'sage'),
            'edit_item' => __('Edit Course', 'sage'),
            'update_item' => __('Update Course', 'sage'),
            'search_items' => __('Search Course', 'sage'),
            'not_found' => __('Not found', 'sage'),
            'not_found_in_trash' => __('Not found in Trash', 'sage'),
        );
        $rewrite = array(
            'slug'                  => 'course',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $post_types['course'] = array(
            'label'                 => __( 'Course', 'sage' ),
            'description'           => __( 'List of danse courses', 'sage' ),
            'labels'                => $labels,
            'supports'              => array('title', 'thumbnail', 'revisions','editor', 'comments'),
            'taxonomies'            => array( 'category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_admin_bar'     => true,
            'show_in_rest'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-book',
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        return $post_types;
    }
    add_filter('piklist_post_types', 'course_post_type');
}
/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
?>
