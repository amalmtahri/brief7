<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

$archive_style = get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		$total_post_count = $wp_query->found_posts;
		$post_count = 1;
		if ( have_posts() ) :

			if ( 'mt-archive--masonry-style' === $archive_style ) {
		?>
				<div class="wp-diary-content-masonry">
					<div id="mt-masonry">
		<?php
			}

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					$current_post = $wp_query->current_post;
					if ( 'mt-archive--block-grid-style' === $archive_style ) {
						if ( 0 === $current_post%5 ) {
		                	echo '<div class="archive-classic-post-wrapper">';
		                } elseif ( 1 === $current_post%5 ) {
		                	echo '<div class="archive-grid-post-wrapper">';
		                }
					}

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

					if ( 'mt-archive--block-grid-style' === $archive_style ) {
						if ( 0 === $current_post%5 || 4 === $current_post%5 || $current_post == $total_post_count ) {
							echo '</div>';
						}
					}

				endwhile;

			if ( 'mt-archive--masonry-style' === $archive_style ) {
		?>
					</div><!-- #mt-masonry -->
				</div><!-- .wp-diary-content-masonry -->
		<?php
			}

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();