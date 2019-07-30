<?php

function figure_data($post_id, $post){
  $parent = " ";
  $cover_image = " ";

  if ($post->post_parent == 0) {
    $parent = $post->post_parent;
  } else {
    $parent = get_the_title( $post );
  }

  if (get_the_post_thumbnail_url($post->ID,'full')) {
    $cover_image = get_the_post_thumbnail_url($post->ID,'full');
    error_log('cover_image = ' . $cover_image);
  }

  $figure = array(
    "wp_id"             => $post_id,
    "title"             => $post->post_title,
    "excerpt"           => $post->post_excerpt,
    "youtube_music"     => $post->df_figure_youtube_music,
    "youtube_counts"    => $post->df_figure_youtube_oncounts,
    "content"           => $post->post_content,
    "type"              => $post->df_figure_type,
    "bars"              => $post->df_figure_bars,
    "categories"        => wp_get_post_terms( $post->ID, 'category',  array("fields" => "names")),
    "tags"              => wp_get_post_terms( $post->ID, 'post_tag',  array("fields" => "names")),
    "levels"            => wp_get_post_terms( $post->ID, 'level',     array("fields" => "names")),
    "styles"            => wp_get_post_terms( $post->ID, 'style',     array("fields" => "names")),
    "cover_image"       => $cover_image,
    'link'              => get_the_permalink( $post->ID ),
    "school"            => get_bloginfo('name'),
    "date"              => $post->post_date,
    "date_gmt"          => $post->post_date_gmt,
    "modified"          => $post->post_modified,
    "modified_gmt"      => $post->post_modified_gmt,
    "slug"              => $post->post_name,
    "menu_order"        => $post->menu_order,
    "status"            => $post->post_status,
    "parent"            => $parent,
  );
  return $figure;
}

?>
