<?php
/**
 * Shows related posts on single post page
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

$get_post_id     = get_the_ID();
$get_categories  = get_the_terms( $get_post_id, 'category' );
$selected_cat 	 = array();

// Get only category slug of current post.
if ( $get_categories && is_array( $get_categories ) ) {
	foreach ( $get_categories as $category ) {
		$selected_cat[] = $category->term_id;
	}
}

$related_posts_count = apply_filters( 'wp_diary_related_posts_count', 3 );

$related_posts_title = apply_filters( 'wp_diary_related_posts_section_title', __( 'Related Posts', 'wp-diary' ) );

$related_posts_args = array(
		'posts_per_page' => absint( $related_posts_count ),
		'post__not_in'   => array( $get_post_id ),
		'category__in'   => $selected_cat,
	);


$related_posts_query = new WP_Query( $related_posts_args );

if( $related_posts_query->have_posts() ) {
?>
	<section class="mt-single-related-posts">
		
		<h2 class="mt-related-post-title"><?php echo esc_html( $related_posts_title ); ?></h2>

		<div class="mt-related-posts-wrapper">
			<?php
				while ( $related_posts_query->have_posts() ) {
					$related_posts_query->the_post();
					get_template_part( 'template-parts/related/content', 'related' );
				}
			?>
		</div><!-- .mt-related-posts-wrapper -->

	</section><!-- .mt-single-related-posts -->

<?php } ?>