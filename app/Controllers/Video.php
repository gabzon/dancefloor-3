<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Video extends Controller
{


  public static function get_videos($style)
  {
    // WP_Query arguments
    $args = [
      'post_type' => ['post'],
      'posts_per_page' => -1,
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'style',
          'field'   => 'slug',
          'terms' => [$style],
        ),
        array(
          'taxonomy' => 'post_format',
          'field'   => 'slug',
          'terms' => ['post-format-video'],
        ),
      )
    ];

    // The Query
    $query = new WP_Query( $args );
    wp_reset_postdata();
    return $query;
  }
}
