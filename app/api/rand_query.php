<?php

add_filter( 'rest_post_collection_params', 'my_prefix_add_rest_orderby_params', 10, 1 );

function my_prefix_add_rest_orderby_params( $params ) {
    $params['orderby']['enum'][] = 'rand';

    return $params;
}
