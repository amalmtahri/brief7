<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_diary_body_classes( $classes ) {
	global $post;

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$wp_diary_site_layout = get_theme_mod( 'wp_diary_site_layout', 'site-layout--wide' );
	$classes[] = esc_attr( $wp_diary_site_layout );

	/**
	 * Add classes about style and sidebar layout for archive, post and page
	 */
	if ( is_archive() || is_home() ) {
		$archive_sidebar_layout = get_theme_mod( 'wp_diary_archive_sidebar_layout', 'no-sidebar' );
		$archive_style          = get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );
		$classes[] = esc_attr( $archive_sidebar_layout );
		$classes[] = esc_attr( $archive_style );
	} elseif ( is_single() ) {
		$single_post_sidebar_layout = get_post_meta( $post->ID, 'wp_diary_post_sidebar_layout', true );
		if ( 'layout--default-sidebar' !== $single_post_sidebar_layout && !empty( $single_post_sidebar_layout ) ) {
			$classes[] = esc_attr( $single_post_sidebar_layout );
		} else {
			$posts_sidebar_layout = get_theme_mod( 'wp_diary_posts_sidebar_layout', 'right-sidebar' );
			$classes[] = esc_attr( $posts_sidebar_layout );
		}
	} elseif ( is_page() ) {
		$single_page_sidebar_layout = get_post_meta( $post->ID, 'wp_diary_post_sidebar_layout', true );
		if ( 'layout--default-sidebar' !== $single_page_sidebar_layout && !empty( $single_page_sidebar_layout ) ) {
			$classes[] = esc_attr( $single_page_sidebar_layout );
		} else {
			$pages_sidebar_layout = get_theme_mod( 'wp_diary_pages_sidebar_layout', 'right-sidebar' );
			$classes[] = esc_attr( $pages_sidebar_layout );
		}
	}

	return $classes;
}
add_filter( 'body_class', 'wp_diary_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wp_diary_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'wp_diary_pingback_header' );

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_fonts_url' ) ) :

	/**
	 * Register Google fonts
	 *
	 * @return string Google fonts URL for the theme.
	 * @since 1.0.0
	 */

    function wp_diary_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Lora translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Lora font: on or off', 'wp-diary' ) ) {
            $font_families[] = 'Lora:400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'wp-diary' ) ) {
            $font_families[] = 'Roboto:300,400,400i,500,700';
        }   

        if ( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles for only admin
 *
 * @since 1.0.0
 */
add_action( 'admin_enqueue_scripts', 'wp_diary_admin_scripts' );

function wp_diary_admin_scripts( $hook ) {

    global $wp_diary_theme_version;

    if ( 'widgets.php' != $hook && 'customize.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'jquery-ui-button' );
    
    wp_enqueue_script( 'wp-diary--admin-script', get_template_directory_uri() .'/assets/js/mt-admin-scripts.js', array( 'jquery' ), esc_attr( $wp_diary_theme_version ), true );

    wp_enqueue_style( 'wp-diary--admin-style', get_template_directory_uri() . '/assets/css/mt-admin-styles.css', array(), esc_attr( $wp_diary_theme_version ) );
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */
function wp_diary_scripts() {

	global $wp_diary_theme_version;

	wp_enqueue_style( 'wp-diary-fonts', wp_diary_fonts_url(), array(), null );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/library/slick/slick.css', array(), '1.9.0' );

	wp_enqueue_style( 'pretty-Photo', get_template_directory_uri() . '/assets/library/prettyphoto/css/prettyPhoto.css', array(), '3.1.6' );
	
	wp_enqueue_style( 'animate', get_template_directory_uri(). '/assets/library/animate/animate.min.css', array(), '3.5.1' );

	wp_enqueue_style( 'wp-diary-style', get_stylesheet_uri(), array(), esc_attr( $wp_diary_theme_version) );

	wp_enqueue_style( 'wp-diary-responsive-style', get_template_directory_uri(). '/assets/css/mt-responsive.css', array(), esc_attr( $wp_diary_theme_version ) );

	wp_enqueue_script( 'wp-diary-combine-scripts', get_template_directory_uri() .'/assets/js/mt-combine-scripts.js', array('jquery'), esc_attr( $wp_diary_theme_version ), true );

	wp_enqueue_script( 'wp-diary-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wp-diary-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'wp-diary-custom-scripts', get_template_directory_uri() .'/assets/js/mt-custom-scripts.js', array('jquery'), esc_attr( $wp_diary_theme_version ), true );

	$wp_diary_enable_sticky_menu = get_theme_mod( 'wp_diary_enable_sticky_menu', true );
	if ( true === $wp_diary_enable_sticky_menu ) {
		$sticky_value = 'on';
	} else {
		$sticky_value = 'off';
	}

	$wp_diary_enable_wow_animation = get_theme_mod( 'wp_diary_enable_wow_animation', true );
	if ( true === $wp_diary_enable_wow_animation ) {
		$wow_value = 'on';
	} else {
		$wow_value = 'off';
	}

	$wp_diary_enable_prettyphoto_gallery = get_theme_mod( 'wp_diary_enable_prettyphoto_gallery', true );
	if ( true == $wp_diary_enable_prettyphoto_gallery ){
		$pretty_photo = 'on';
	}else{
		$pretty_photo = 'off';
	}

	wp_localize_script( 'wp-diary-custom-scripts', 'wpdiaryObject', array(
        'menu_sticky' => $sticky_value,
		'wow_effect'  => $wow_value,
		'pretty_photo' => $pretty_photo
    ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_diary_scripts' );

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_get_fontawesome_social_icons_array' ) ) :

	/**
     * Font Awesome
     *
     * @param string $file_path font awesome css file path
     * @param string $class_prefix change this if the class names does not start with `fa-`
     * @return array
     */

	function wp_diary_get_fontawesome_social_icons_array() {

		$social_icons_array = array( 'facebook-square', 'facebook', 'facebook-official', 'twitter-square', 'twitter', 'github', 'behance', 'behance-square', 'whatsapp', 'qq', 'wechat', 'weixin', 'tumblr', 'tumblr-square', 'instagram', 'google-plus-circle', 'google-plus-official', 'google-plus-square', 'google-plus', 'dribbble', 'skype', 'snapchat', 'snapchat-ghost', 'snapchat-square', 'pinterest', 'pinterest-square', 'pinterest-p', 'linkedin-square', 'linkedin', 'reddit', 'reddit-square', 'youtube-square', 'youtube', 'youtube-play', 'yelp' );

		foreach ( $social_icons_array as $icon ) {
			$icon_name = ucfirst( str_ireplace( array( '-' ), array( ' ' ), $icon ) );
			$font_awesome_icons[esc_attr( $icon )] = esc_html( $icon_name );
		}
		return $font_awesome_icons;

	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * get the required strings from content string.
 *
 * @return string $found
 */
function wp_diary_get_string( $string, $start, $end ){
    $found = array();
    $pos = 0;
    while( true ) {
        $pos = strpos( $string, $start, $pos );
        if ($pos === false) { // Zero is not exactly equal to false...
            return $found;
        }
        $pos += strlen( $start );
        $len = strpos( $string, $end, $pos ) - $pos;
        $found[] = substr( $string, $pos, $len );
    }
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_social_media_content' ) ) :

	/**
	 * function to display the social icons
	 */
	
	function wp_diary_social_media_content() {

		$social_icons = get_theme_mod( 'wp_diary_social_icons_lists', array(
			array(
				'social_icon' => 'facebook',
				'social_url'  => '#',
			),
			array(
				'social_icon' => 'twitter',
				'social_url'  => '#',
			),
		) );

		if ( ! empty( $social_icons ) && is_array( $social_icons ) ) {
?>

			<ul class="mt-social-icon-wrap">
				<?php
					foreach ( $social_icons as $social_icon ) {
						if ( ! empty( $social_icon['social_url'] ) ) {
				?>

							<li class="mt-social-icon">
								<a href="<?php echo esc_url( $social_icon['social_url'] ); ?>">
									<i class="fa fa-<?php echo esc_attr( $social_icon['social_icon'] ); ?>"></i>
								</a>
							</li>

				<?php
						}
					}
				?>
			</ul>

<?php 
		}
	}

endif;


/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_select_categories_list' ) ) :

	/**
	 * function to return category lists
	 *
	 * @return $wp_diary_categories_list in array
	 */
	
	function wp_diary_select_categories_list() {

		$wp_diary_get_categories = get_categories( array( 'hide_empty' => 0 ) );
		$wp_diary_categories_list[''] = __( 'Select Category', 'wp-diary' );

        foreach ( $wp_diary_get_categories as $category ) {
            $wp_diary_categories_list[esc_attr( $category->slug )] = esc_html( $category->cat_name );
        }
        
        return $wp_diary_categories_list;
	}

endif;


/*----------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_is_sidebar_layout' ) ) :

	/**
	 * Checks if the current page matches the given layout
	 *
	 * @return string $layout layout of current page.
	 */

	function wp_diary_is_sidebar_layout() {

		global $post;
		$layout = '';

		if ( is_archive() || is_home() ) {
			$layout = get_theme_mod( 'wp_diary_archive_sidebar_layout', 'no-sidebar' );
		} elseif ( is_single() ) {
			$single_post_layout = get_post_meta( $post->ID, 'wp_diary_post_sidebar_layout', true );
			if ( 'layout--default-sidebar' !== $single_post_layout ) {
				$layout = $single_post_layout;
			} else {
				$layout = get_theme_mod( 'wp_diary_posts_sidebar_layout', 'right-sidebar' );
			}
		} elseif ( is_page() ) {
			$single_page_layout = get_post_meta( $post->ID, 'wp_diary_post_sidebar_layout', true );
			if ( 'layout--default-sidebar' !== $single_page_layout ) {
				$layout = $single_page_layout;
			} else {
				$layout = get_theme_mod( 'wp_diary_pages_sidebar_layout', 'right-sidebar' );
			}
		}

		return $layout;
	}

endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_inner_header_bg_image' ) ) :

    /**
     * Background image for inner page header
     *
     * @since 1.0.0
     */

    function wp_diary_inner_header_bg_image( $input ) {

        $image_attr = array();

        if ( empty( $image_attr ) ) {

            // Fetch from Custom Header Image.
            $image = get_header_image();
            if ( ! empty( $image ) ) {
                $image_attr['url']    = $image;
                $image_attr['width']  = get_custom_header()->width;
                $image_attr['height'] = get_custom_header()->height;
            }
        }

        if ( ! empty( $image_attr ) ) {
            $input .= 'background-image:url(' . esc_url( $image_attr['url'] ) . ');';
            $input .= 'background-size:cover;';
        }

        return $input;
    }

endif;

add_filter( 'wp_diary_inner_header_style_attribute', 'wp_diary_inner_header_bg_image' );

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'wp_diary_css_strip_whitespace' ) ) :
	
	/**
	 * Get minified css and removed space
	 *
	 * @since 1.0.0
	 */

    function wp_diary_css_strip_whitespace( $css ){
        $replace = array(
            "#/\*.*?\*/#s" => "",  // Strip C style comments.
            "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys( $replace );
        $css = preg_replace( $search, $replace, $css );

        $replace = array(
            ": "  => ":",
            "; "  => ";",
            " {"  => "{",
            " }"  => "}",
            ", "  => ",",
            "{ "  => "{",
            ";}"  => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys( $replace );
        $css = str_replace( $search, $replace, $css );

        return trim( $css );
    }

endif;

if ( ! function_exists( 'wp_diary_boxed_layout_bg' ) ) :
    
    function wp_diary_boxed_layout_bg( $control ) {
        if ( 'site-layout--boxed' === $control->manager->get_setting( 'wp_diary_site_layout' )->value() ) {
            return true;
        } else {
            return false;
        }
    }

endif;

if( !function_exists( 'wp_diary_get_header_sticky_sidebar' ) ) :
	/**
	 * Header sticky sidebar content.
	 */
	function wp_diary_get_header_sticky_sidebar() {
?>
		<div class="sidebar-header sticky-header-sidebar">
			<div class="sticky-header-sidebar sidebar-header-block">
				<?php

					/**
					 * wp_diary_header_categories_lists hook
					 *
					 * @hooked wp_diary_header_categories_lists_content - 10
					 *
					 * @since 1.0.0
					 */
					do_action( 'wp_diary_header_categories_lists' );

					/**
					 * wp_diary_header_author_box hook
					 *
					 * @hooked wp_diary_header_author_box_content - 10
					 *
					 * @since 1.0.0
					 */
					do_action( 'wp_diary_header_author_box' );

				?>
			</div><!-- .sticky-header-sidebar sidebar-header-block -->
		</div><!-- .sidebar-header -->
<?php
	}
endif;