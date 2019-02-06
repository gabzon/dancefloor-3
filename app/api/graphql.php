<?php

add_action( 'init', function() {
   register_post_type( 'course', [
      'show_in_graphql' => true,
      'hierarchical' => true,
      'graphql_single_name' => 'Course',
      'graphql_plural_name' => 'Courses',
   ] );
} );

add_action( 'graphql_register_types', function() {
  register_graphql_field( 'Post', 'color', [
     'type' => 'String',
     'description' => __( 'The color of the post', 'wp-graphql' ),
     'resolve' => function( $post ) {
       $color = get_post_meta( $post->ID, 'color', true );
       return ! empty( $color ) ? $color : 'blue';
     }
  ] );
} );


add_action( 'graphql_init', function() {
  add_filter( 'graphql_course_fields', function( $fields ) {

    $fields['courseTitle'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_title', true );
      },
    ];

    $fields['startDate'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_start_date', true );
      },
    ];

    $fields['endDate'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_end_date', true );
      },
    ];
    $fields['startTime'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_start_time', true );
      },
    ];
    $fields['endTime'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_end_time', true );
      },
    ];
    $fields['teacher'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_teacher', true );
      },
    ];
    $fields['alert'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_attention_message', true );
      },
    ];
    $fields['fullPrice'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_full_price', true );
      },
    ];
    $fields['reducedPrice'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_reduced_price', true );
      },
    ];
    $fields['courseType'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_post_meta( $post->ID, 'course_type', true );
      },
    ];
    $fields['coverImage'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_the_post_thumbnail_url($post->ID);
      },
    ];
    $fields['thumbnail'] = [
      'type' => \WPGraphQL\Types::string(),
      'resolve' => function( \WP_Post $post ) {
        return get_the_post_thumbnail_url($post->ID,'thumbnail');
      },
    ];

    $fields['classroom'] = [
      'type' => \WPGraphQL\Types::list_of(\WPGraphQL\Types::string()),
      'resolve' => function( \WP_Post $post ) {
        return wp_get_post_terms( $post->ID, 'classroom', array("fields" => "names"));
      },
    ];
    $fields['day'] = [
      'type' => \WPGraphQL\Types::list_of(\WPGraphQL\Types::string()),
      'resolve' => function( \WP_Post $post ) {
        return wp_get_post_terms( $post->ID, 'day_of_week', array("fields" => "names"));
      },
    ];
    $fields['level'] = [
      'type' => \WPGraphQL\Types::list_of(\WPGraphQL\Types::string()),
      'resolve' => function( \WP_Post $post ) {
        return wp_get_post_terms( $post->ID, 'level', array("fields" => "names"));
      },
    ];
    $fields['style'] = [
      'type' => \WPGraphQL\Types::list_of(\WPGraphQL\Types::string()),
      'resolve' => function( \WP_Post $post ) {
        return wp_get_post_terms( $post->ID, 'style', array("fields" => "names"));
      },
    ];

    return $fields;
  } );
} );
