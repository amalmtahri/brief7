<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

global $wp_query;

$current_post 		= $wp_query->current_post;
$archive_style 		= get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );
$post_content_type 	= apply_filters( 'wp_diary_archive_post_content_type', 'excerpt' );

if( has_post_thumbnail() ) {
    $post_class = 'has-thumbnail';
} else {
    $post_class = 'no-thumbnail';
}

if( $current_post < 3 && 'mt-archive--masonry-style' === $archive_style ) {
	$post_class .= '';
} else {
	$post_class .= ' wow fadeInUp';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<?php
		wp_diary_post_thumbnail();

		if ( 'post' === get_post_type() ) {
	?>
		<div class="entry-cat">
			<?php
				wp_diary_article_categories_list();
			?>
		</div><!-- .entry-meta -->
	<?php } ?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-meta">
		<?php
			wp_diary_posted_on();
			wp_diary_posted_comments();
		?>
	</div><!-- .entry-meta -->
	
	<div class="entry-content">
		<?php
			if ( 'excerpt' === $post_content_type ) {
				the_excerpt();
			} elseif ( 'content' === $post_content_type ) {
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-diary' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php wp_diary_entry_footer(); ?>
		
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->