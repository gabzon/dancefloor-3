<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Home extends Controller
{
  public static function get_wall_posts()
  {
    // WP_Query arguments
    $args = [
      'post_type'             => array( 'post' , 'course'),
      'order'                 => 'DESC',
      'posts_per_page'        => 3,
      'category_name'         => 'wall'
    ];
    // The Query
    $query = new WP_Query( $args );
    return $query;
  }

}
