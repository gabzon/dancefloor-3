<?php

add_action( 'rest_api_init', 'slug_register_meta' );
function slug_register_meta() {
    register_rest_field( 'classroom',
        'classroom_quartier',
        array(
            'get_callback'    => 'slug_get_meta',
            'update_callback' => 'slug_update_meta',
            'schema'          => null,
        )
    );
}
function slug_get_meta( $object, $field_name, $request ) {
    return get_term_meta( $object[ 'id' ] );
}
function slug_update_meta($value, $object, $field_name){
    // please note: make sure that $object is indeed and object or array
    return update_post_meta($object['id'], $field_name, $value);
}
