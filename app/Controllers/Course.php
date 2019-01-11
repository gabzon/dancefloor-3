<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class Course extends Controller
{
  private static $rooms;

  public static function display_classrooms(){
    // WP_Query arguments
    $args = [
      'post_type' =>  ['classroom'],
      'posts_per_page' => -1,
    ];

    // The Query
    $classrooms = new WP_Query( $args );

    // The Loop
    if ( $classrooms->have_posts() ) {
      while ( $classrooms->have_posts() ) {
        $classrooms->the_post();
        ?>
        <button class="ui circular button icon"  style="background:<?= get_post_meta(get_the_ID(),'classroom_color',true); ?> !important; color:white !important;"></button>
        <a href="<?php the_permalink(); ?>" style="padding-top:100px !important"><?= get_the_title(); ?></a>
        <?php
      }
    } else {
      _e('We are not able to find any classroom currently','sage');
    }
    // Restore original Post Data
    wp_reset_postdata();
  }

  public static function get_courses_by_day($day){
    // WP_Query arguments
    $args = array(
      'post_type'         => array( 'course' ),
      'posts_per_page'    => -1,
      'order'             => 'ASC',
      'meta_value'        => 'class',
    );

    // The Query
    $courses = new WP_Query( $args );

    $tab = [];
    $mon = [];
    $tue = [];
    $wed = [];
    $thu = [];
    $fri = [];
    $sat = [];
    $sun = [];

    // The Loop
    if ( $courses->have_posts() ) {
      while ( $courses->have_posts() ) {
        $courses->the_post();
        switch (get_post_meta(get_the_ID(),'course_day',true)) {
          case 'Monday':
          $mon[] = get_the_ID();
          break;
          case 'Tuesday':
          $tue[] = get_the_ID();
          break;
          case 'Wednesday':
          $wed[] = get_the_ID();
          break;
          case 'Thursday':
          $thu[] = get_the_ID();
          break;
          case 'Friday':
          $fri[] = get_the_ID();
          break;
          case 'Saturday':
          $sat[] = get_the_ID();
          break;
          case 'Sunday':
          $sun[] = get_the_ID();
          break;
          default:
          # code...
          break;
        }
      }
    } else {
      _e('There are no courses currently','sage');
    }
    wp_reset_postdata();

    $tab['mon'] = $mon;
    $tab['tue'] = $tue;
    $tab['wed'] = $wed;
    $tab['thu'] = $thu;
    $tab['fri'] = $fri;
    $tab['sat'] = $sat;
    $tab['sun'] = $sun;

    switch ($day) {
      case 'mon': return $tab['mon'];
      break;
      case 'tue': return $tab['tue'];
      break;
      case 'wed': return $tab['wed'];
      break;
      case 'thu': return $tab['thu'];
      break;
      case 'fri': return $tab['fri'];
      break;
      case 'sat': return $tab['sat'];
      break;
      case 'sun': return $tab['sun'];
      break;
    }
  }

  public static function get_room( $key )
  {
    $classrooms = get_posts([
      'post_type' => 'classroom',
      'posts_per_page' => -1,
      'post_belongs' => $key,
      'post_status' => 'publish',
      'suppress_filters' => false // This must be set to false
    ]);
    $room = [];
    foreach ($classrooms as $salle) { $room =  $salle->ID; }
    return $room;
  }

  public static function get_classroom( $key )
  {
    $classroom = wp_get_post_terms( $key, 'classroom');
    return $classroom;
  }

  public static function get_style( $key )
  {
    $style = wp_get_post_terms( $key, 'style');
    return $style;
  }

  public static function get_levels( $key )
  {
    $levels = wp_get_post_terms( $key, 'level');
    return $levels;
  }

  public static function get_days( $key )
  {
    $days = wp_get_post_terms( $key, 'day_of_week');

    $days_to_remove = [];

    for ($i=0; $i < count($days); $i++) {
      if ($days[$i]->slug == 'monday') {
        array_push($days_to_remove, 0);
      }
      if ($days[$i]->slug == 'tuesday') {
        array_push($days_to_remove, 1);
      }
      if ($days[$i]->slug == 'wednesday') {
        array_push($days_to_remove, 2);
      }
      if ($days[$i]->slug == 'thursday') {
        array_push($days_to_remove, 3);
      }
      if ($days[$i]->slug == 'friday') {
        array_push($days_to_remove, 4);
      }
      if ($days[$i]->slug == 'saturday') {
        array_push($days_to_remove, 5);
      }
      if ($days[$i]->slug == 'sunday') {
        array_push($days_to_remove, 6);
      }
    }
    asort($days_to_remove);

    return $days_to_remove;
    //return $days;

  }

  public static function days_of_week()
  {
    $days = [
      'monday',
      'tuesday',
      'wednesday',
      'thursday',
      'friday',
      'saturday',
      'sunday'
    ];
    return $days;
  }

  public static function class( $day ) {
    $args = array(
      'post_type'       => [ 'course' ],
      'posts_per_page'  => -1,
      'post_status'     => 'publish',
      'tax_query'       => array(
        array(
          'taxonomy'  => 'day_of_week',
          'field'     => 'slug',
          'terms'     => $day,
        )
      ),
      'meta_query'      => array(
        'relation'      => 'AND',
        array(
          'key'         => 'course_type',
          'value'       => 'class'
        ),
        'hour_clause' => array(
          'key'    => 'course_start_time',
        )
      ),
      'orderby' => array(
        'hour_clause' => 'ASC'
      )
    );

    $class = new WP_Query( $args );
    return $class;
  }

  public static function get_color_bar($classroom, $style){
    $dancefloor_options = get_option('dancefloor_settings');

    if ($dancefloor_options['df_display_schedule_color'] == 'style') {
      if($style){
        return get_term_meta($style[0]->term_id, 'style_color', true);
      }else {
        return 'black';
      }
    }else{
      if($classroom){
        return get_term_meta($classroom[0]->term_id, 'classroom_color', true);
      }else {
        return 'black';
      }
    }
  }
}
