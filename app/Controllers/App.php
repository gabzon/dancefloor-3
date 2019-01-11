<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function site_logo()
    {
      $custom_logo_id = get_theme_mod( 'custom_logo' );
      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      return $image[0];
    }

    public static function schedule_pdf_path()
    {
      // return $dancefloor_options['schedule'];
    }

    public static function bank_details()
    {
      // return $dancefloor_options['bank_details'];
    }

    public static function social()
    {
      $dancefloor_options = get_option('dancefloor_settings');
      $social = [
        'facebook'    => $dancefloor_options['df_facebook'],
        'twitter'     => $dancefloor_options['df_twitter'],
        'youtube'     => $dancefloor_options['df_youtube'],
        'instagram'   => $dancefloor_options['df_instagram'],
        'snapchat'    => $dancefloor_options['df_snapchat'],
        'google_plus' => $dancefloor_options['df_google_plus'],
        'vimeo'       => $dancefloor_options['df_vimeo'],
      ];
      return $social;
    }

    public static function phone($phone = '')
    {
      $dancefloor_options = get_option('dancefloor_settings');

      if ($dancefloor_options['df_phone']) {
        $phone = $dancefloor_options['df_phone'];
      }

      return $phone;
    }

    public static function email()
    {
      $dancefloor_options = get_option('dancefloor_settings');
      return $dancefloor_options['df_email'];
    }

    public static function prices($key)
    {
      $dancefloor_options = get_option('dancefloor_settings');
      // Regular price
      if ( get_post_meta($key,'course_full_price',true) )
      {
        $regular_price = get_post_meta($key,'course_full_price', true);
      }
      else
      {
        $regular_price = $dancefloor_options['df_default_regular_price'];
      }

      // Reduced price
      if (get_post_meta($key,'course_reduced_price',true))
      {
        $reduced_price = get_post_meta($key,'course_reduced_price', true);
      }
      else
      {
        $reduced_price = $dancefloor_options['df_default_reduced_price'];
      }

      $prices = [
        'regular_price' => $regular_price,
        'reduced_price' => $reduced_price,
        'currency'      => $dancefloor_options['df_currency'],
        'multi_price'   => get_post_meta($key,'course_multiprice', true),
      ];

      return $prices;
    }

    public static function pricing()
    {
      $dancefloor_options = get_option('dancefloor_settings');
    }

    public static function display_news_title($display = 'yes')
    {
      $dancefloor_options = get_option('dancefloor_settings');
      $display = $dancefloor_options['df_display_news_title'];
      return $display;
    }
}
