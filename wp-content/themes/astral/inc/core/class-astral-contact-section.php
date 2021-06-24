<?php
/**
 * The Contact Section
 *
 * @package Astral
 */

/**
 * Class astral_Contact_Section
 */
class astral_Contact_Section extends astral_Abstract_Main {
	/**
	 * Initialize Contact Section
	 */
	public function __construct() {
		add_action( 'astral_contact_area', array( $this, 'astral_contact' ) );
	}

	public function init() {

	}

	/**
	 * Contact section content.
	 *
	 * @since astral 0.1
	 */
	function astral_contact() {
		$contact_image        = get_theme_mod( 'contact_image' );
		$astral_contact_title = get_theme_mod( 'astral_contact_title' );
		$astral_phoneno       = get_theme_mod( 'astral_phoneno' );
		$astral_address       = get_theme_mod( 'astral_address' );
		$astral_email         = get_theme_mod( 'astral_email' );
		if ( get_theme_mod( 'astral_contact_show' ) == 1 ) : ?>
            <div class="parallax" style="background-image:url(<?php if ( $contact_image ) {
				echo esc_url( $contact_image );
			} else {
				echo esc_url( get_template_directory_uri() ) . "/images/inner.jpg";
			} ?>)">
                <div class="abt_bottom py-lg-5 " id="contact">
                    <div class="container">
                        <div class="mwa_title text-center">
                            <h4 class="mwa-title"> <?php echo esc_html( $astral_contact_title ); ?> </h4>
                        </div>
                        <div class="row text-center contact_info">
                            <div class="col-sm-4 col-xs-6 first-box ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <h1><i class="fa fa-phone"></i></h1>
                                        </div>
                                        <div class="flip-card-back">
                                            <h3><?php esc_html_e( 'Phone', 'astral' ); ?></h3>
                                            <p><?php echo esc_html( $astral_phoneno ); ?></p><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-6 first-box ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <h1><i class="fa fa-location-arrow" aria-hidden="true"></i></h1>
                                        </div>
                                        <div class="flip-card-back">
                                            <h3><?php esc_html_e( 'Location', 'astral' ); ?></h3>
                                            <p><?php echo esc_html( $astral_address ); ?></p><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-6 first-box ">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <h1><i class="fa fa-envelope" aria-hidden="true"></i></h1>
                                        </div>
                                        <div class="flip-card-back">
                                            <h3><?php esc_html_e( 'E-mail', 'astral' ); ?></h3>
                                            <p><?php echo esc_html( $astral_email ); ?></p><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif;
	}
}
$astral_Contact_Section = new astral_Contact_Section();