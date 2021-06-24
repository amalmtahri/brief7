<?php
/**
 * Foodie Diary functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP Diary
 * @subpackage Foodie Diary
 * @since 1.0.0
 */

if ( ! function_exists( 'foodie_diary_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function foodie_diary_setup() {
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_image_size( 'foodie-diary-featured-post', 600, 400, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'top_menu'  => esc_html__( 'Top Menu', 'foodie-diary' )
        ) );
	}
endif;
add_action( 'after_setup_theme', 'foodie_diary_setup' );

/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string $foodie_diary_version
 */
function foodie_diary_theme_version_info() {
    $foodie_diary_theme_info = wp_get_theme();
    $GLOBALS['foodie_diary_version'] = $foodie_diary_theme_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'foodie_diary_theme_version_info' );

/*----------------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'foodie_diary_fonts_url' ) ) :

	/**
	 * Register Google fonts for Foodie Diary.
	 *
	 * @return string Google fonts URL for the theme.
	 * @since 1.0.0
	 */
    function foodie_diary_fonts_url() {
        $fonts_url = '';
        $font_families = array();
        /*
         * Translators: If there are characters in your language that are not supported
         * by Annie Use Your Telescope translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Annie Use Your Telescope: on or off', 'foodie-diary' ) ) {
            $font_families[] = 'Annie Use Your Telescope:400';
        }        

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Condensed translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto Condensed: on or off', 'foodie-diary' ) ) {
            $font_families[] = 'Annie Use Your Telescope:400,700';
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

/*--------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */

function foodie_diary_scripts() {
    global $foodie_diary_version;    

    wp_enqueue_style( 'foodie-diary-fonts', foodie_diary_fonts_url(), array(), null );

    wp_dequeue_style( 'wp-diary-style' );    

    wp_dequeue_style( 'wp-diary-responsive-style' );

    wp_enqueue_style( 'foodie-diary-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $foodie_diary_version ) );

    wp_enqueue_style( 'foodie-diary-parent-responsive-style', get_template_directory_uri() . '/assets/css/mt-responsive.css', array(), esc_attr( $foodie_diary_version ) );

    wp_enqueue_style( 'foodie-diary-style', get_stylesheet_uri(), array(), esc_attr( $foodie_diary_version ) );

    wp_enqueue_style( 'foodie-diary-responsive-style', get_stylesheet_directory_uri() . '/responsive.css', array(), esc_attr( $foodie_diary_version ) );

    	$foodie_diary_primary_color = get_theme_mod( 'wp_diary_primary_color', '#EF5350' );

    	$output_css = '';

        $output_css .= ".edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,.widget_search .search-submit,.widget_search .search-submit:hover,.mt-menu-search .mt-form-wrap .search-form .search-submit:hover,.menu-toggle:hover,.slider-btn,.entry-footer .mt-readmore-btn,article.sticky::before,.post-format-media--quote,.mt-gallery-slider .slick-prev.slick-arrow:hover,.mt-gallery-slider .slick-arrow.slick-next:hover,.wp_diary_social_media a:hover{ background: ". esc_attr( $foodie_diary_primary_color ) ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover ,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.mt-social-icon-wrap li a:hover,.site-title a:hover,.mt-sidebar-menu-toggle:hover,.mt-menu-search:hover,.sticky-header-sidebar-menu li a:hover,#site-navigation ul li:hover>a,#site-navigation ul li.current-menu-item>a,#site-navigation ul li.current_page_item>a,#site-navigation ul li.current_page_ancestor>a,.slide-title a:hover,.entry-title a:hover,.cat-links a,.entry-title a:hover,.cat-links a:hover,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover,#top-footer .widget-title ,#footer-menu li a:hover,.wp_diary_latest_posts .mt-post-title a:hover,#mt-scrollup:hover,.mt-featured-single-item .item-title a:hover{ color: ". esc_attr( $foodie_diary_primary_color ) ."}\n";        

        $output_css .= ".widget_search .search-submit,.widget_search .search-submit:hover,.no-thumbnail,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover ,#secondary .widget .widget-title,.mt-related-post-title,.error-404.not-found,.wp_diary_social_media a:hover{ border-color: ". esc_attr( $foodie_diary_primary_color ) ."}\n";

        $refine_output_css = wp_diary_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'foodie-diary-style', $refine_output_css );
}

add_action( 'wp_enqueue_scripts', 'foodie_diary_scripts', 99 );


/*--------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'frontpage_featured_section' ) ) :

	/**
	 * 
	 * Function for featured posts section
	 *
	 */
	function frontpage_featured_section() {
		if ( ! is_front_page() ) {
			return;
		}
		get_template_part( 'template-parts/featured', 'posts' );
	}

endif;

add_action( 'wp_diary_after_header', 'frontpage_featured_section', 20 );

/*--------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Customizer file 
 *
 */
require get_stylesheet_directory() . '/customizer/customizer.php';

/**
 * Load theme settings page.
 */
require get_stylesheet_directory() . '/inc/mt-theme-settings.php';

/*--------------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'foodie_diary_section_top_header_content' ) ) :
    
    /**
     * function to display top header section
     */

    function foodie_diary_section_top_header_content() {
        $foodie_diary_enable_top_header = get_theme_mod( 'foodie_diary_enable_top_header', false );
        if ( false === $foodie_diary_enable_top_header ) {
            return;
        }
        $foodie_diary_top_header_phone = get_theme_mod( 'foodie_diary_top_header_phone', '(541) 754-3010' );
        $foodie_diary_top_header_email = get_theme_mod( 'foodie_diary_top_header_email', 'example@example.com' );
?>
        <div class="mt-section-top-header">
            <div class="mt-top-header-content-wrapper mt-container">
                <div class="mt-top-contact-wrap">
                    <div class="mt-contact-info mt-contact-info--phone">
                        <a href="<?php echo esc_url( 'tel:'.  esc_attr( $foodie_diary_top_header_phone ) ); ?>">
                            <i class="fa fa-phone"></i>
                            <span><?php echo esc_html( $foodie_diary_top_header_phone ); ?></span>
                        </a>
                    </div><!-- .mt-contact-info--phone -->
                    <div class="mt-contact-info mt-contact-info--email">
                        <a href="<?php echo esc_url( 'mailto:' . sanitize_email( $foodie_diary_top_header_email ) ); ?>">
                            <i class="fa fa-envelope"></i>
                            <span><?php echo esc_html( $foodie_diary_top_header_email ); ?></span>
                        </a>
                    </div><!-- .mt-contact-info--email -->
                </div><!-- .mt-top-contact-wrap -->

                <div class="mt-top-header-menu">
                    <nav id="top-navigation" class="top-navigation">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'top_menu',
                                'menu_id'        => 'top-menu',
                                'fallback_cb'    => false,
                                'depth'          => 1
                            ) );
                        ?>
                    </nav><!-- #top-navigation -->
                </div><!-- .mt-top-header-menu"> -->
            </div><!-- .mt-top-header-content-wrapper -->
        </div><!-- .mt-top-header -->
<?php
    }

endif;

add_action( 'wp_diary_before_header', 'foodie_diary_section_top_header_content', 10 );

/**
     * function to display the social icons
     */
    
    function wp_diary_social_media_content() {

        $social_icons_option = get_theme_mod( 'foodie_diary_enable_social_icons', false );

        if ( true !== $social_icons_option ) {
            return;
        }

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