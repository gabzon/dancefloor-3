<?php

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype($output)
{
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'add_opengraph_doctype');

//add Open Graph Meta Info
function insert_fb_in_head()
{
    global $post;
    if (!is_singular()) //if it is not a post or a page
        return;

    if ($excerpt = $post->post_excerpt)
    {
        $excerpt = strip_tags($post->post_excerpt);
    }
    else
    {
        $excerpt = get_bloginfo('description');
    }

    //echo '<meta property="fb:app_id" content="YOUR APPID"/>';
    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:description" content="' . $excerpt . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="' . get_bloginfo() . '"/>';

    echo '<meta name="twitter:title" content="' . get_the_title() . '"/>';
    echo '<meta name="twitter:card" content="summary" />';
    echo '<meta name="twitter:description" content="' . $excerpt . '" />';
    echo '<meta name="twitter:url" content="' . get_permalink() . '"/>';

    if (!has_post_thumbnail($post->ID))
    {
        //the post does not have featured image, use a default image
        $default_image = "http://example.com/image.jpg"; //<--replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
        echo '<meta name="twitter:image" content="' . $default_image . '"/>';
    }
    else
    {
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
        echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
        echo '<meta name="twitter:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
    }
}

add_action('wp_head', 'insert_fb_in_head', 5);
?>
