<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'video' ) );

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
    * Enable logo option in the customizer
    * @link https://developer.wordpress.org/themes/functionality/custom-logo/
    */
    add_theme_support( 'custom-logo' );

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});


// Custom functions
// Load sage text domain for translations in "resources/lang"
// https://discourse.roots.io/t/install-sage9-language-files/10638/8
add_action( 'after_setup_theme', function () {
  load_theme_textdomain( 'sage', get_template_directory() . '/lang' );
} );

function get_image_type($image){
  $w = $image[1];
  $h = $image[2];
  if ( $w > $h) {
    if ($w > ($h*2)) {
      return 'landscape-2';
    }else {
      return 'landscape';
    }
  } else if ( $w < $h ) {
    return 'portrait';
  } else {
    return 'squared';
  }
}

add_role( 'teacher',    __( 'Teacher','sage' ),     array( 'read' => true, 'edit_posts' => true, 'delete_posts' => true) );
add_role( 'assistant',  __( 'Assistant','sage' ),   array( 'read' => true, 'edit_posts' => true, 'delete_posts' => true) );

//disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php
// remove_filter('pre_user_description', 'wp_filter_kses');
// //add sanitization for WordPress posts
// add_filter( 'pre_user_description', 'wp_filter_post_kses');




/*
Custom WPML Switcher for bootstrap
https://wpml.org/forums/topic/bootstrap-and-lang-switcher/
*/
// function new_nav_menu_items($items,$args) {
//
//     if (function_exists('icl_get_languages')) {
//
//         $languages = icl_get_languages('skip_missing=0' && $args->theme_location == 'top_menu' );
//
//         if(1 < count($languages)){
//
//             // $ll_flag = $languages[ICL_LANGUAGE_CODE]['country_flag_url'];
//             // $ll_url = $languages[ICL_LANGUAGE_CODE]['url'];
//             // $ll_code = $languages[ICL_LANGUAGE_CODE]['language_code'];
//             // $ll_nname = $languages[ICL_LANGUAGE_CODE]['native_name'];
//
//             //$items = $items.'<li class="dropdown lang"><a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="'.$ll_url.'"><img src="'.$ll_flag.'" height="12" alt="'.$ll_code.'" width="18" /> '. $ll_nname .'</a><ul class=dropdown-menu>';
//
//             foreach($languages as $l){
//                 if( ! $l['active'] ) {
//                     $items = $items.'<li class="menu-item"><a href="'.$l['url'].'"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> '. $l['native_name'] .'</a></li>';
//                 }
//             }
//         }
//     }
//     return $items;
// }
// add_filter( 'wp_nav_menu_items', 'new_nav_menu_items',10,2 );
