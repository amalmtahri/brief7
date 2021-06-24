<?php
/**
 * Astral header functions to be hooked
 *
 * @package Astral
 */
if ( ! function_exists( 'astral_doctype' ) ) :
	function astral_doctype() { ?>
        <!doctype html>
        <html <?php language_attributes(); ?>>
		<?php
	}
endif;

if ( ! function_exists( 'astral_head' ) ) :
	function astral_head() { ?>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"/>
        <!-- //Meta tag Keywords -->
		<?php if ( is_singular() && pings_open() ) { ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php }
	}
endif;

if ( ! function_exists( 'astral_page_start' ) ) :
	function astral_page_start() {
		if(get_theme_mod('astral_topbar_toggle','1')) { 
		$astral_phoneno = get_theme_mod( 'astral_phoneno' );
		$astral_address = get_theme_mod( 'astral_address' );
		$astral_email   = get_theme_mod( 'astral_email' ); ?>
        <div class="header_contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 email">
					<p>
					<?php if($astral_email) { ?>
					<i class="fa fa-envelope"></i> <a href="mailto:<?php echo esc_attr( $astral_email ); ?>"> <?php echo esc_html( $astral_email ); ?></a> | <?php } ?> 
					<?php if($astral_phoneno) { ?>
					<i class="fa fa-phone"></i> <?php echo esc_html( $astral_phoneno ); ?> </p> <?php } ?>
                    </div>
                    <div class="col-md-6 col-sm-6 phone">
					<?php if($astral_address) { ?>
                        <p><i class="fa fa-location-arrow"> </i> <?php echo esc_html( $astral_address ); ?> </p>
					<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    	<?php } ?>
        <header id="home" <?php if ( has_header_image() ) { ?> style="background-image:url(<?php echo esc_url( get_header_image() ); ?>)" <?php } ?>>
            <div class="container">
                <div class="row">
				<?php if(get_theme_mod('layout_picker_setting')=="center_layout") : ?>
					<div class="header col-md-12 col-sm-12 logo-center">
                        <!-- logo -->
                        <div id="logo">
                            <h1>
                                <a style="color: #<?php echo esc_attr( get_theme_mod( 'header_textcolor' ) ); ?>"
                                   title="<?php the_title_attribute(); ?>" href="<?php echo esc_url( home_url() ); ?>">

									<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
									$image                = wp_get_attachment_image_src( $custom_logo_id, 'full' );

									if ( has_custom_logo() ) { ?>
                                        <img src="<?php echo esc_url( $image[0] ); ?>"/>
									<?php } elseif ( display_header_text() ) {
										echo esc_html( get_bloginfo( 'name' ) );
									} ?>

                                </a>
                            </h1>

                            <p style="color: #<?php echo esc_attr( get_theme_mod( 'header_textcolor' ) ); ?>">
								<?php
								if ( display_header_text() ) {
									echo esc_html( get_bloginfo( 'description' ) );
								}
								?>
                            </p>
							
							<div class="social center-social">
							<?php if ( has_nav_menu( 'social' ) ) : 
									wp_nav_menu(
										array(
											'theme_location' => 'social',
											'menu_class'     => 'social-network ',
											'walker' => new WO_Nav_Social_Walker(),
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
											'link_after'     => '</span>',
										)
									);
							endif; ?>
							</div>							
						</div>
                    </div>
					<?php else : ?>
					<div class="header col-md-6 col-sm-12">
                        <!-- logo -->
                        <div id="logo">
                            <h1>
                                <a style="color: #<?php echo esc_attr( get_theme_mod( 'header_textcolor' ) ); ?>"
                                   title="<?php the_title_attribute(); ?>" href="<?php echo esc_url( home_url() ); ?>">

									<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
									$image                = wp_get_attachment_image_src( $custom_logo_id, 'full' );

									if ( has_custom_logo() ) { ?>
                                        <img src="<?php echo esc_url( $image[0] ); ?>"/>
									<?php } elseif ( display_header_text() ) {
										echo esc_html( get_bloginfo( 'name' ) );
									} ?>

                                </a>
                            </h1>

                            <p style="color: #<?php echo esc_attr( get_theme_mod( 'header_textcolor' ) ); ?>">
								<?php
								if ( display_header_text() ) {
									echo esc_html( get_bloginfo( 'description' ) );
								}
								?>
                            </p>
                        </div>
                        <!-- //logo -->
                    </div>
                    <div class="col-md-6 col-sm-12 social">
					<?php if ( has_nav_menu( 'social' ) ) : 
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'menu_class'     => 'social-network ',
									'walker' => new WO_Nav_Social_Walker(),
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								)
							);
					endif; ?>
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </header>
		<?php
	}
endif;

if ( ! function_exists( 'astral_menus' ) ) :
	function astral_menus() { ?>
        <div class="menu1" id="main-menu">
            <div id="app" class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'astral' ); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<?php if(get_theme_mod('layout_picker_setting')=="center_layout") : $astral_menu_layout="center_menu_layout"; endif; ?>
                    <div id="navbarNavDropdown" class="navbar-collapse collapse <?php echo $astral_menu_layout; ?>">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'primary',
							'depth'           => 4, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'navbar-collapse collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav nav-item',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						) );
						?>
                    </div>
                </nav>
            </div>
        </div>
	<?php }
endif;