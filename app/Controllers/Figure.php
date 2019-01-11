<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Figure extends Controller
{
  public static function list_of_styles(){
    $terms = get_terms( 'style', array(
      'hide_empty' => false,
    ) );
    return $terms;
  }

  public static function list_of_figures($style, $level)
  {
    $args = array(
      'post_type' => 'figure',
      'tax_query' => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'style',
          'field'    => 'slug',
          'terms'    => $style,
        ),
        array(
          'taxonomy' => 'level',
          'field'    => 'slug',
          'terms'    => $level
        ),
      ),
    );
    $query = new WP_Query( $args );
    return $query;
  }
}
