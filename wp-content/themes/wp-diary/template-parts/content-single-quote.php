<?php
/**
 * Template part for displaying single quote post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */
$content = apply_filters( 'the_content', get_the_content() );

if ( function_exists( 'register_block_type' ) ) {
	if ( class_exists( 'Classic_Editor' ) ) {
		$quote_string = wp_diary_get_string( $content, '<blockquote>','</blockquote>' );
	} else {
		$quote_string = wp_diary_get_string( $content, '<blockquote class="wp-block-quote">','</blockquote>' );
	}
} else {
	$quote_string = wp_diary_get_string( $content, '<blockquote>','</blockquote>' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
		if ( !empty( $quote_string ) ){
			echo '<div class="entry-content">';
				echo '<blockquote>'. $quote_string[0] . '</blockquote>';
			echo '</div> <!-- .entry-content -->';
		} else {
			wp_diary_post_thumbnail();
		}
	?>

	<div class="mt-cats-list">

		<?php wp_diary_article_categories_list(); ?>

	</div>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-meta">
		<?php
			wp_diary_posted_on();
			wp_diary_posted_by();
			wp_diary_posted_comments();
		?>
	</div><!-- .entry-meta -->
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div> <!-- .entry-content -->
	
	<footer class="entry-footer">

		<?php wp_diary_entry_footer(); ?>

	</footer><!-- .entry-footer -->

	<?php get_template_part( 'template-parts/author/entry', 'author-box' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
