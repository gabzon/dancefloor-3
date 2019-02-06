<?php

//https://medium.com/@dalenguyen/how-to-get-featured-image-from-wordpress-rest-api-5e023b9896c6
add_action('rest_api_init', 'register_rest_images' );

function register_rest_images(){
    register_rest_field( array('post','figure','course'),
        'featured_img_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return 'https://os.alipayobjects.com/rmsportal/QBnOOoLaAfKPirc.png';
}


add_action( 'rest_api_init', 'create_api_course_teacher' );

function create_api_course_teacher() {

    // register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
    register_rest_field( 'course', 'teacher', array(
           'get_callback'    => 'get_post_meta_teacher_for_api',
           'update_callback' => null,
           'schema'          => null,
        )
    );
}

function get_post_meta_teacher_for_api( $object ) {
    //get the id of the post object array
    $post_id = $object['id'];

    //return the post meta
    return get_post_meta( $post_id, 'course_teacher', true);
}
