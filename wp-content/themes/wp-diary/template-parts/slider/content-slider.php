<?php
/**
 * Template for displaying content of slider post.
 *
 * @package Mystery Theems
 * @subpackage WP Diary
 * @since 1.0.0
 */

if ( !has_post_thumbnail() ) {
	return false;
}

$wp_diary_slider_read_more = get_theme_mod( 'wp_diary_slider_read_more', __( 'Discover', 'wp-diary' ) );

?>

<div class="slide-wrapper">
	
	<figure><?php the_post_thumbnail( 'wp-diary-slider-post' ); ?></figure>
	
	<div class="slide-content-wrap">
		<div class="slide-content-block">
			<div class="slide-content">
				<?php wp_diary_article_categories_list(); ?>
				<h3 class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<a class="mt-btn slider-btn" href="<?php the_permalink(); ?>"><?php echo esc_html( $wp_diary_slider_read_more ); ?></a>
			</div>
		</div>
	</div><!-- .slide-content-wrap -->

</div><!-- .slide-wrapper -->