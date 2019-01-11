<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Lesson extends Controller
{
  public static function display_enrolled_members()
  {
    if ( is_user_logged_in() )
    {
      $output = '';
      $enrolls = get_post_meta($post->ID,'enroll_group');

      $output += '<section class="enrolled-members">';
        $output += '<h3>'. __('Enrolled members', 'sage') . '</h3>';
        $output += '<table class="table table-hover">';
        for ($i=0; $i < count($enrolls[0]); $i++) {
          $output += '<tr>';
            $output += '<td>';
              $user_info = get_userdata($enrolls[0][$i]['members']);
              $output += $user_info->first_name . ' ' . $user_info->last_name . '<br>';
            $output += '</td>';
            $output += '<td>';
            if ($enrolls[0][$i]['member_cours_payment'] == 'paid') {
              $output += '<div class="ui green big label">';
              $output += $enrolls[0][$i]['member_cours_payment'];
              $output += '</div>';
            } else {
              $output += '<div class="ui red big label">';
                $output += __('Not paid', 'sage');
              $output += '</div>';
            }
            $output += '</td>';
          $output += '</tr>';
        }
        $output += '</table>';
      $output += '</section>';
    }
  }

  public static function display_videos()
  {
    if (is_user_logged_in())
    {
      $videos = get_post_meta($post->ID,'course_videos');
      $output = '';

      $output += '<section class="cours-videos">';
      $output += '<h3>' . __('Videos', 'sage') . '</h3>';
        $output += '<div class="row">';
        foreach ($videos as $v) {
          $output += '<div class="col">';
          $youtube_link = 'http://www.youtube.com/embed/' . $v . '?rel=0&modestbranding=1';
          $output += '<iframe width="100%" height="210" src="' . $youtube_link . '" frameborder="0" allowfullscreen></iframe>';
          $output += '</div>';
        }
        $output += '</div>';
      $output += '</section>';
    }
  }
}
