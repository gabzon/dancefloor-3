<?php

// https://generatewp.com/filtering-posts-by-taxonomies-in-the-dashboard/
function filter_course_by_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	if ( 'course' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'day_of_week', 'style', 'level', 'classroom' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_course_by_taxonomies' , 10, 2);



// Previous code not working !!!!!!!!!!!

/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
// add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
// function tsm_filter_post_type_by_taxonomy() {
// 	global $typenow;
// 	$post_type = 'course'; // change to your post type
// 	$taxonomy  = 'day'; // change to your taxonomy
// 	if ($typenow == $post_type) {
// 		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
// 		$info_taxonomy = get_taxonomy($taxonomy);
// 		wp_dropdown_categories(array(
// 			'show_option_all' => __("Show All {$info_taxonomy->label}"),
// 			'taxonomy'        => $taxonomy,
// 			'name'            => $taxonomy,
// 			'orderby'         => 'name',
// 			'selected'        => $selected,
// 			'show_count'      => true,
// 			'hide_empty'      => true,
// 		));
// 	};
// }
// /**
//  * Filter posts by taxonomy in admin
//  * @author  Mike Hemberger
//  * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
//  */
// add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
// function tsm_convert_id_to_term_in_query($query) {
// 	global $pagenow;
// 	$post_type = 'course'; // change to your post type
// 	$taxonomy  = 'day'; // change to your taxonomy
// 	$q_vars    = &$query->query_vars;
// 	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
// 		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
// 		$q_vars[$taxonomy] = $term->slug;
// 	}
// }
