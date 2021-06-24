<?php
/**
 * Template part for displayinng quote post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

global $wp_query;

$content = apply_filters( 'the_content', get_the_content() );

if ( function_exists( 'register_block_type' ) ) {
	if( class_exists( 'Classic_Editor' ) ){
		$quote_string = wp_diary_get_string( $content, '<blockquote>','</blockquote>' );
	}else{
		$quote_string = wp_diary_get_string( $content, '<blockquote class="wp-block-quote">','</blockquote>' );
	}
}else{
	$quote_string = wp_diary_get_string( $content, '<blockquote>','</blockquote>' );
}

$current_post 		= $wp_query->current_post;
$archive_style 		= get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );

if( $current_post < 3 && 'mt-archive--masonry-style' === $archive_style ) {
	$post_class = '';
} else {
	$post_class = 'wow fadeInUp';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
	
	<?php 
	if( !empty( $quote_string ) ){
		echo '<div class="entry-content post-format-media--quote">';
			echo '<blockquote>'. $quote_string[0] . '</blockquote>';
		echo '</div> <!-- .entry-content -->';
	}else{
		wp_diary_post_thumbnail();
	} ?>

	<div class="entry-cat">
		<?php
			wp_diary_article_categories_list();
		?>
	</div><!-- .entry-meta -->

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-meta">
		<?php
			wp_diary_posted_on();
			wp_diary_posted_comments();
		?>
	</div><!-- .entry-meta -->
	
	<footer class="entry-footer">

		<?php wp_diary_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
