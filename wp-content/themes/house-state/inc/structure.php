<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

$options = house_state_get_theme_options();  


if ( ! function_exists( 'house_state_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since House State 1.0.0
	 */
	function house_state_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'house_state_doctype', 'house_state_doctype', 10 );


if ( ! function_exists( 'house_state_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'house_state_before_wp_head', 'house_state_head', 10 );

if ( ! function_exists( 'house_state_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'house-state' ); ?></a>

		<?php
	}
endif;
add_action( 'house_state_page_start_action', 'house_state_page_start', 10 );

if ( ! function_exists( 'house_state_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'house_state_page_end_action', 'house_state_page_end', 10 );

if ( ! function_exists( 'house_state_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_site_branding() {
		$options  = house_state_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];
		?>
		 <div class="menu-overlay"></div>
		 
		 <header id="masthead" class="site-header" role="banner">
			
            <div class="wrapper">
                <div class="site-branding">
					<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php } 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
						<div id="site-identity">
							<?php
							if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
								if ( house_state_is_latest_posts() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
							} 
							if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
								<?php
								endif; 
							}?>
						</div>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo house_state_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
				echo house_state_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
				?>			
				</button>
				<?php  
					$search = '';
					$search = '<li class="search-menu"><a href="#">';
					$search .= house_state_get_svg( array( 'icon' => 'search' ) );
					$search .= house_state_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search">';
					$search .= get_search_form( $echo = false );
	                $search .= '</div><!-- #search --></li>';
	        	
	        		wp_nav_menu( array(
	        			'theme_location' => 'primary',
	        			'container' => 'div',
	        			'menu_class' => 'menu nav-menu',
	        			'menu_id' => 'primary-menu',
	        			'echo' => true,
	        			'fallback_cb' => 'house_state_menu_fallback_cb',
	        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $search . '</ul>',
	        		) );
				?>
				</nav><!-- #site-navigation -->
            </div><!-- .wrapper -->
		</header><!-- .header-->
		<?php
	}
endif;
add_action( 'house_state_header_action', 'house_state_site_branding', 10 );

if ( ! function_exists( 'house_state_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'house_state_content_start_action', 'house_state_content_start', 10 );

if ( ! function_exists( 'house_state_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since House State 1.0.0
     *
     */
    function house_state_header_image() {
        if ( house_state_is_frontpage() )
            return;
        $header_image = get_header_image();
        ?>

        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php house_state_custom_header_banner_title(); ?>
                </header>
                <?php house_state_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php
    }
endif;
add_action( 'house_state_header_image_action', 'house_state_header_image', 10 );

if ( ! function_exists( 'house_state_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since House State 1.0.0
	 */
	function house_state_add_breadcrumb() {
		$options = house_state_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( house_state_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * house_state_simple_breadcrumb hook
				 *
				 * @hooked house_state_simple_breadcrumb -  10
				 *
				 */
				do_action( 'house_state_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'house_state_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'house_state_content_end_action', 'house_state_content_end', 10 );

if ( ! function_exists( 'house_state_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_footer_start() {
		$options  = house_state_get_theme_options();
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( true === $options['scroll_top_visible'] ) : ?>
				<span class="arrow-up"></span>
	            <div class="scroll-to-top">
	                <a href="#">
	                    <span><?php echo esc_html__( 'Scroll', 'house-state' ); ?></span>
	                    <svg viewBox="0 0 792.033 792.033" class="icon icon-scroll-down">
	                        <path d="M617.858,370.896L221.513,9.705c-13.006-12.94-34.099-12.94-47.105,0c-13.006,12.939-13.006,33.934,0,46.874
	                        l372.447,339.438L174.441,735.454c-13.006,12.94-13.006,33.935,0,46.874s34.099,12.939,47.104,0l396.346-361.191
	                        c6.932-6.898,9.904-16.043,9.441-25.087C627.763,386.972,624.792,377.828,617.858,370.896z"></path>
	                    </svg>
	                </a>
	            </div>
			<?php endif;
	}
endif;
add_action( 'house_state_footer', 'house_state_footer_start', 10 );

if ( ! function_exists( 'house_state_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_footer_site_info() {
		$options = house_state_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'];
		$theme_data = wp_get_theme();
		?>
		<div class="site-info">
                <div class="wrapper">
                    <span>
                    <?php 
	                	echo house_state_santize_allow_tag( $copyright_text ); 
	                	echo " | ".esc_html__( 'House State by ', 'house-state' )." <a href='". esc_url( $theme_data->get( 'AuthorURI' ) ) ."'>". esc_html( ucwords( $theme_data->get( 'Author' ) ) ) ."</a>";

	                	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
                	?>
                	</span>
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'house_state_footer', 'house_state_footer_site_info', 40 );


if ( ! function_exists( 'house_state_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since House State 1.0.0
	 *
	 */
	function house_state_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'house_state_footer', 'house_state_footer_end', 100 );

