<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/*----------------------------------------------------------------------------------------------------------------------------------------*/


if ( ! function_exists( 'wp_diary_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wp_diary_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			'%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_posted_by' ) ) :

	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wp_diary_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'wp-diary' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_posted_comments' ) ) :

	/**
	 * Show comment count and leave comment link if no comments are posted
	 */
	function wp_diary_posted_comments() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-diary' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wp_diary_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wp-diary' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wp-diary' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if( 'post' === get_post_type() && ! is_single() ) {

			$wp_diary_archive_read_more = get_theme_mod( 'wp_diary_archive_read_more', __( 'Discover', 'wp-diary' ) );
	?>
			<a href="<?php the_permalink(); ?>" class="mt-readmore-btn"><?php echo esc_html( $wp_diary_archive_read_more ); ?></a>
	<?php
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'wp-diary' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_post_thumbnail' ) ) :
	
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wp_diary_post_thumbnail() {

		global $wp_query;
		$current_post = $wp_query->current_post;

		$thumbnail_size  = 'post-thumbnail';
		$archive_style   = get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );
		$sidebar_layout  = wp_diary_is_sidebar_layout();

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		// define image size in various section

		if ( 'mt-archive--masonry-style' === $archive_style ) {
			$thumbnail_size = 'wp-diary-post-auto';
		} elseif ( 'mt-archive--classic-style' === $archive_style && ( 'no-sidebar' === $sidebar_layout || 'no-sidebar-center' === $sidebar_layout ) ) {
			$thumbnail_size = 'wp-diary-full-width';
		} elseif ( 'mt-archive--block-grid-style' === $archive_style ) {
			if ( 0 === $current_post%5 ) {
				$thumbnail_size = 'wp-diary-full-width';
			} else {
				$thumbnail_size = 'wp-diary-post';
			}
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'wp-diary-full-width' ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( $thumbnail_size, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'wp_diary_article_categories_list' ) ) :

	/**
	 * Display the lists of categories at only articles
	 */

	function wp_diary_article_categories_list() {

		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( '<span class="cat-seperator"> </span>' );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'wp-diary' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

endif;