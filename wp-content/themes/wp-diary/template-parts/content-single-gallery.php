<?php
/**
 * Template part for displaying single link post format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

$gallery = get_post_gallery( get_the_ID(), false );
if ( function_exists( 'register_block_type' ) ) {
	if ( class_exists( 'Classic_Editor' ) ) {
		if ( !empty( $gallery ) ) {
			$gallery_attachment_ids = explode( ',', $gallery['ids'] );
		} else {
			$gallery_attachment_ids = '';
		}
	} else {
		$post_blocks = parse_blocks( $post->post_content );
		foreach ( $post_blocks as $key => $value ) {
			if ( 'core/gallery' === $value['blockName'] ) {
				$gallery_attachment_ids = $value['attrs']['ids'];
			}
		}
	}
} elseif ( !empty( $gallery ) ) {
	$gallery_attachment_ids = explode( ',', $gallery['ids'] );
} else {
	$gallery_attachment_ids = '';
}
$layout_style           = wp_diary_is_sidebar_layout();
$thumbnail_size         = 'wp-diary-full-width';

if ( ( 'no-sidebar' === $layout_style || 'no-sidebar-center' === $layout_style ) ) {
	$thumbnail_size = 'wp-diary-full-width';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! empty( $gallery_attachment_ids ) ) { ?>

		<div class="post-format-media post-format-gallery post-format-media--gallery">
			<div class="mt-gallery-slider">
				<?php foreach ( $gallery_attachment_ids as $gallery_attachment_id ) { ?>
					<li>
						<?php echo wp_get_attachment_image( $gallery_attachment_id, $thumbnail_size ); // WPCS xss ok. ?>
					</li>
				<?php } ?>
			</div><!-- .mt-gallery-slider -->
		</div><!-- .post-format-gallery -->

	<?php } else { wp_diary_post_thumbnail(); } ?>

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
