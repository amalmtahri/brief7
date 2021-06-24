<?php
/**
 * Template part for displaying single audio post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

$get_content = apply_filters( 'the_content', get_the_content() );
$get_video   = get_media_embedded_in_content( $get_content, array( 'video', 'object', 'embed', 'iframe' ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-format-media post-format-media--video">
		<?php if ( ! empty( $get_video ) ) : ?>
			<div class="post-format-video">
				<?php echo $get_video[0]; // WPCS xss ok. ?>
			</div>
		<?php endif; ?>
	</div> <!-- .post-format-media post-format-media--video -->
	
	<?php wp_diary_post_thumbnail(); ?>

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
