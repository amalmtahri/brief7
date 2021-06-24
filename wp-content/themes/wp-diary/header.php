<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip To Content', 'wp-diary' ) ?></a>
    <?php
        /**
         * wp_diary_after_header hook
         *
         * @since 1.0.7
         */
        do_action( 'wp_diary_before_header' );
    ?>
	<header id="masthead" class="site-header">
		<div class="mt-logo-row-wrapper clearfix">
			<div class="mt-container">
				
				<div class="mt-header-social-wrapper">
					<?php wp_diary_social_media_content(); ?>
				</div><!-- .mt-header-social-wrapper -->

				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() || is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$wp_diary_description = get_bloginfo( 'description', 'display' );
					if ( $wp_diary_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $wp_diary_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<div class="mt-header-extra-icons">
					<?php
						$wp_diary_enable_sidebar_menu_icon = get_theme_mod( 'wp_diary_enable_sidebar_menu_icon', true );
						$wp_diary_enable_search_icon = get_theme_mod( 'wp_diary_enable_search_icon', true );

						if ( true === $wp_diary_enable_sidebar_menu_icon ) {
					?>
							<div class="mt-sidebar-menu-toggle">
                                <a href="javascript:void(0)"><i class="fa fa-navicon"></i></a>
							</div>
							<span class="sidebar-header-sticky-form-wrapper">
								<div class="sidebar-header mt-form-close" data-focus="mt-sidebar-menu-toggle">
									<a href="javascript:void(0)"><i class="fa fa-close"></i></a>
								</div>
					<?php
								wp_diary_get_header_sticky_sidebar();
					?>
							</span><!-- .sidebar-header-sticky-form-wrapper -->
					<?php
						}

						if ( true === $wp_diary_enable_search_icon ) {
					?>
							<div class="mt-menu-search">
								<div class="mt-search-icon"><a href="javascript:void(0)"><i class="fa fa-search"></i></a></div>
								<div class="mt-form-wrap">
									<?php get_search_form(); ?>
                                    <div class="mt-form-close" data-focus="mt-search-icon"><a href="javascript:void(0)"><i class="fa fa-close"></i></a></div>
								</div>
							</div>
					<?php
						}
					?>
				</div>

			</div> <!-- mt-container -->
		</div><!-- .mt-logo-row-wrapper -->
        
          			
        <div class="main-menu-wrapper">
            <div class="menu-toggle"><a href="javascript:void(0)"><i class="fa fa-navicon"></i><?php esc_html_e( 'Menu', 'wp-diary' ); ?></a></div>
    		<nav id="site-navigation" class="main-navigation">
    			<div class="mt-container">
					<div class="mt-form-close" data-focus="menu-toggle">
						<a href="javascript:void(0)"><i class="fa fa-close"></i></a>
					</div>
    				<?php
    					wp_nav_menu( array(
    						'theme_location' => 'primary_menu',
    						'menu_id'        => 'primary-menu',
    					) );
    				?>
    			</div>
    		</nav><!-- #site-navigation -->
      </div> <!-- main menu wrapper -->

	</header><!-- #masthead -->

	<?php
		/**
		 * wp_diary_after_header hook
		 *
		 * @since 1.0.0
		 */
		do_action( 'wp_diary_after_header' );


		if ( ! is_front_page() ) {
            /**
    		 * wp_diary_innerpage_header hook
    		 *
    		 * @hooked - wp_diary_innerpage_header_start - 5
    		 * @hooked - wp_diary_innerpage_header_title - 10
    		 * @hooked - wp_diary_breadcrumb_content - 15
    		 * @hooked - wp_diary_innerpage_header_end - 20
    		 *
    		 * @since 1.0.0
    		 */
    		do_action( 'wp_diary_innerpage_header' );
        }
	?>

	<div id="content" class="site-content">
		<div class="mt-container">