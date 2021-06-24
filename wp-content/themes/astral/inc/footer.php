<?php
/**
 * Astral footer functions to be hooked
 *
 * @package Astral
 */
if ( ! function_exists( 'astral_footer_widget' ) ) :
	/**
	 * footer widget area
	 */
	function astral_footer_widget() {
		?>
        <div class="container">
            <div class="row p-sm-4 py-3">
				<?php
				if ( is_active_sidebar( 'footer-widget' ) ) {
					dynamic_sidebar( 'footer-widget' );
				} else {
					$astral_widget_column = get_theme_mod( 'astral_widget_column','4' );
					$args = array(
						'before_widget' => '<div class="mwa_footer_widget col-lg-'.$astral_widget_column.' col-md-6 mt-lg-0 mt-4">',
						'after_widget'  => '</div>',
						'before_title'  => '<h3 class="mb-3 f_title">',
						'after_title'   => '</h3>'
					);
					the_widget( 'WP_Widget_Pages', null, $args );
				}
				?>
            </div>
        </div>
		<?php
	}
endif;

if ( ! function_exists( 'astral_copyright' ) ) :
	/**
	 * footer copyright area
	 */
	function astral_copyright() {
		$footer_copyright = get_theme_mod( 'footer_copyright' );
		$footer_link      = get_theme_mod( 'footer_link' );
		$footer_text      = get_theme_mod( 'footer_text' );
		?>
        <p class="text-wh"><?php echo esc_html( $footer_copyright ); ?><a href="<?php echo esc_url( esc_attr( $footer_link ) ); ?>"> <?php echo esc_html( $footer_text ); ?></a>
        </p>
		<?php
	}
endif;