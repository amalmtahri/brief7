<?php
/**
 * Displays Author bio on single post
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

$author_id         = get_the_author_meta( 'ID' );
$author_avatar     = get_avatar( $author_id, 'thumbnail' );
$author_post_link  = get_the_author_posts_link();
$author_bio        = get_the_author_meta( 'description' );
$author_url        = get_the_author_meta( 'user_url' );

?>

<div class="mt-author-box">

	<?php if ( $author_avatar ) { ?>
		<div class="mt-author__avatar">
			<?php echo $author_avatar; ?>
		</div><!-- .mt-author-avatar -->
	<?php } ?>

	<div class="mt-author-info">
		<?php if ( $author_post_link ) { ?>
				<h5 class="mt-author-name"><?php echo $author_post_link; ?></h5>
		<?php } ?>

		<?php if ( $author_bio ) { ?>
			<div class="mt-author-bio">
				<?php echo wp_kses_post( $author_bio ); ?>
			</div><!-- .mt-author-bio -->
		<?php } ?>


		<div class="mt-author-meta">
			<?php if ( $author_url ) { ?>
				<div class="mt-author-website">
					<span><?php esc_html_e( 'Website', 'wp-diary' ); ?></span>
					<a href="<?php echo esc_url( $author_url ); ?>" target="_blank"><?php echo esc_url( $author_url ); ?></a>
				</div><!-- .mt-author-website -->
			<?php } ?>
		</div><!-- .mt-author-meta -->
	</div><!-- .mt-author-info -->

</div><!-- .mt-author-bio -->
