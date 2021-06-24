<?php
class astral_main {

	function __construct() {
		// Register action/filter callbacks here...
		add_action( 'after_setup_theme', array( $this, 'astral_setup_theme' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'astral_scripts' ) );
		add_action( 'widgets_init', array( $this, 'astral_register_sidebars' ) );
		add_action( 'wp_footer', array( $this, 'astral_footer_script' ) );
	}

	function astral_setup_theme() {

		global $content_width;

		if ( ! isset( $content_width ) ) {
			$content_width = 900;
		}

		/* navigation menu */
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu, menu_depth is 4', 'astral' ),
				'social' => __( 'Social Links Menu', 'astral' ),
			)
		);
		
		/* woocommerce */
		add_theme_support( 'woocommerce' );
		
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'custom-logo', array() );

		$args = array(
			'default-text-color' => 'fff',
			'width'              => 1000,
			'height'             => 250,
			'flex-width'         => true,
			'flex-height'        => true,
		);
		add_theme_support( 'custom-header', $args );

		add_theme_support( "custom-background", $args );

		add_theme_support( 'post-thumbnails' );

		/* image size */
		add_image_size( 'astral-blog-thumb', 700, 430, true );
		add_image_size( 'astral-about-thumb', 540, 430, true );

		add_theme_support( 'title-tag' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_editor_style();

		if ( is_singular() ) {
			wp_enqueue_script( "comment-reply" );
		}

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'editor-styles' );

	}

	function astral_scripts() {

		// Enqueue main theme stylesheet
		wp_enqueue_style( 'astral-style', get_stylesheet_uri() );

		// Enqueue theme CSS
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css' );
		wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper.min.css' );

		// Enqueue JS for theme 
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/js/swiper.min.js' );

		wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
		wp_enqueue_script( 'wow-js', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ) );
		wp_enqueue_script( 'astral-theme-script', get_template_directory_uri() . '/js/astral-theme-script.js' );
		
		wp_enqueue_style('Playfair-Display','//fonts.googleapis.com/css?family=Playfair+Display&display=swap');
		
		/* web font */
		$font_var          = '300,400,600,700,900,300italic,400italic,600italic,700italic,900italic';
        $http              = ( ! empty( $_SERVER['HTTPS'] ) ) ? "https" : "https";
		$main_heading_font1 = get_theme_mod('main_heading_font','Playfair Display');
        $main_heading_font = str_replace( ' ' , '+', $main_heading_font1 );
		$menu_font1 = get_theme_mod('menu_font', 'Playfair Display');
        $menu_font         = str_replace( ' ' , '+', $menu_font1 );
		$theme_title1 = get_theme_mod('theme_title', 'Playfair Display');
        $theme_title       = str_replace( ' ' , '+', $theme_title1 );
		$desc_font_all1 = get_theme_mod('desc_font_all', 'Playfair Display');
        $desc_font_all     = str_replace( ' ' , '+', $desc_font_all1 );
		
        wp_enqueue_style('googleFonts', $http . '://fonts.googleapis.com/css?family=' . $main_heading_font . ':' . $font_var);	
        wp_enqueue_style('menu_font', $http . '://fonts.googleapis.com/css?family=' . $menu_font . ':' . $font_var);	
        wp_enqueue_style('theme_title', $http . '://fonts.googleapis.com/css?family=' . $theme_title . ':' . $font_var);
        wp_enqueue_style('desc_font_all', $http . '://fonts.googleapis.com/css?family=' . $desc_font_all . ':' . $font_var);

	}
	
	function astral_footer_script() {
		wp_enqueue_script( 'astral-footer-script', get_template_directory_uri() . '/js/astral-footer-script.js' );
	}

	function astral_register_sidebars() {
		/* Register the 'primary' sidebar. */
		register_sidebar(
			array(
				'id'            => 'sidebar-primary',
				'name'          => __( 'Primary Sidebar', 'astral' ),
				'description'   => __( 'A sidebar for page and blog pages.', 'astral' ),
				'before_widget' => '<div id="%1$s" class="mwa_widget mb-4 p-sm-4 p-3 border">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="courses-title">',
				'after_title'   => '</h3>',
			)
		);

		$astral_widget_column = get_theme_mod( 'astral_widget_column','4' );
		register_sidebar(
			array(
				'id'            => 'footer-widget',
				'name'          => __( 'Footer Widget Area', 'astral' ),
				'description'   => __( 'Sidebar for footer.', 'astral' ),
				'before_widget' => '<div id="%1$s" class="mwa_footer_widget col-lg-'.$astral_widget_column.' col-md-6 mt-lg-0 mt-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="mb-3 f_title">',
				'after_title'   => '</h3>',
			)
		);
	}
}
/* initialize class */
new astral_main();