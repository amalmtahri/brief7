<?php
/**
 * Managed the custom functions and hooks for entire theme.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/*----------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_header_categories_lists_content' ) ) :
	
	/**
	 * function to display categories lists
	 */

	function wp_diary_header_categories_lists_content() {
		
		$get_categories = get_categories( array( 'orderby' => 'name', 'order'   => 'ASC' ) );
?>
			<div class="mt-header-cat-list-wrapper">
				<ul class="sticky-header-sidebar-menu mt-slide-cat-lists">
					<?php
						$count = 1;
						$cat_list_items = apply_filters( 'wp_diary_menu_cat_list_items', 5 );
						foreach( $get_categories as $category ) {
							$cat_link  = get_category_link( $category->term_id );
							$cat_name  = $category->name;
							$cat_count = $category->count;
							if ( $count <= $cat_list_items ) {
					?>
								<li class="cat-item">
									<a href="<?php echo esc_url( $cat_link ); ?>">
										<?php
											echo esc_html( $cat_name );
											echo '<span>'. esc_html( $cat_count ) .'</span>';
										?>
									</a>
								</li>
					<?php
							}
							$count ++;
						}
					?>
				</ul><!-- .mt-slide-cat-lists -->
			</div><!-- .mt-header-cat-list-wrapper -->
<?php
	}

endif;

add_action( 'wp_diary_header_categories_lists', 'wp_diary_header_categories_lists_content', 10 );


/*----------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_header_author_box_content' ) ) :
	
	/**
	 * function to display author info
	 */

	function wp_diary_header_author_box_content() {

		$wp_diary_user_id = apply_filters( 'wp_diary_header_user_id', 1 );
?>
		<div class="sticky-header-sidebar-author author-bio-wrap">
            <div class="author-avatar"><?php echo get_avatar( $wp_diary_user_id, '150' ); ?></div>
            <h3 class="author-name"><?php echo esc_html( get_the_author_meta( 'nicename', $wp_diary_user_id ) ); ?></h3>
            <div class="author-description"><?php echo wp_kses_post( wpautop( get_the_author_meta( 'description', $wp_diary_user_id ) ) ); ?></div>
            <div class="author-social">
                <?php wp_diary_social_media_content(); ?>
            </div><!-- .author-social -->
        </div><!-- .author-bio-wrap -->
<?php
	}

endif;

add_action( 'wp_diary_header_author_box', 'wp_diary_header_author_box_content', 10 );


/*----------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_front_page_slider_section' ) ) :

	/**
	 * function to display the slider section at front page
	 */
	
	function wp_diary_front_page_slider_section() {

		$wp_diary_enable_slider = get_theme_mod( 'wp_diary_enable_slider', true );
		if ( true === $wp_diary_enable_slider && is_front_page() ) {
			get_template_part( 'template-parts/slider/slider', 'post' );
		}
	}

endif;

add_action( 'wp_diary_after_header', 'wp_diary_front_page_slider_section', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------*/

add_action( 'wp_diary_scroll_top', 'wp_diary_scroll_top_content', 10 );

if ( ! function_exists( 'wp_diary_scroll_top_content' ) ) :

	/**
	 * Function for scroll top
	 *
	 * @since 1.0.0
	 */

	function wp_diary_scroll_top_content() {
        echo '<div id="mt-scrollup" class="animated arrow-hide">'. __( 'Back To Top', 'wp-diary' ) .'</div>';
	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_innerpage_header_start' ) ) :

	/**
	 * function to manage starting div of section
	 */

	function wp_diary_innerpage_header_start() {
		$inner_header_attribute = '';
		$inner_header_attribute = apply_filters( 'wp_diary_inner_header_style_attribute', $inner_header_attribute );
		if ( !empty( $inner_header_attribute ) ) {
			$header_class = 'has-bg-img';
		} else {
			$header_class = 'no-bg-img';
		}
?>
		<div class="custom-header <?php echo esc_attr( $header_class ); ?>" <?php echo ( ! empty( $inner_header_attribute ) ) ? ' style="' . esc_attr( $inner_header_attribute ) . '" ' : ''; ?>>
            <div class="mt-container">
<?php
	}

endif;

if ( ! function_exists( 'wp_diary_innerpage_header_title' ) ) :

	/**
	 * function to display the page title
	 */

	function wp_diary_innerpage_header_title() {
		if ( is_single() || is_page() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_archive() ) {
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		} elseif ( is_search() ) {
	?>
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'wp-diary' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php
		} elseif ( is_404() ) {
			echo '<h1 class="entry-title">'. esc_html( '404 Error', 'wp-diary' ) .'</h1>';
		} elseif ( is_home() ) {
			$page_for_posts_id = get_option( 'page_for_posts' );
			$page_title = get_the_title( $page_for_posts_id );
	?>
			<h1 class="entry-title"><?php echo esc_html( $page_title ); ?></h1>
	<?php
		}
	}

endif;

if ( !function_exists( 'wp_diary_breadcrumb_content' ) ) :

	/**
	 * function to manage the breadcrumbs content
	 */

	function wp_diary_breadcrumb_content() {

		$wp_diary_breadcrumb_option = get_theme_mod( 'wp_diary_enable_breadcrumb_option', true );

		if ( false === $wp_diary_breadcrumb_option ) {
			return;
		}
?>
		<nav id="breadcrumb" class="mt-breadcrumb">
			<?php
			breadcrumb_trail( array(
				'container'   => 'div',
				'before'      => '<div class="mt-container">',
				'after'       => '</div>',
				'show_browse' => false,
			) );
			?>
		</nav>
<?php
	}

endif;

if ( ! function_exists( 'wp_diary_innerpage_header_end' ) ) :

	/**
	 * function to manage ending div of section
	 */

	function wp_diary_innerpage_header_end() {
?>
			</div><!-- .mt-container -->
		</div><!-- .custom-header -->
<?php
	}
	
endif;

add_action( 'wp_diary_innerpage_header', 'wp_diary_innerpage_header_start', 5 );
add_action( 'wp_diary_innerpage_header', 'wp_diary_innerpage_header_title', 10 );
add_action( 'wp_diary_innerpage_header', 'wp_diary_breadcrumb_content', 15 );
add_action( 'wp_diary_innerpage_header', 'wp_diary_innerpage_header_end', 20 );