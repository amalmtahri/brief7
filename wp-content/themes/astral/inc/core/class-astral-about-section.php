<?php
/**
 * The Callout Section
 *
 * @package Astral
 */

/**
 * Class astral_about_Section
 */
class astral_about_Section extends astral_Abstract_Main {
	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_callout_area', array( $this, 'astral_callout' ) );
	}

	public function init() {

	}

	/**
	 * Callout section content.
	 *
	 * @since astral 0.1
	 */
	function astral_callout() {
		if ( get_theme_mod( 'astral_callout_show' ) ) : 
		$args = array( 
		'post_type' => 'page',
		'post_status'=>'publish', 
		'post__in' => array(get_theme_mod('astral_about_section')));

		$about_sec = new WP_Query( $args );
		if ( $about_sec->have_posts() ):
		while ( $about_sec->have_posts() ):
		$about_sec->the_post();
		?>
            <div class="abt_bottom py-lg-5 mwa-theme" id="callout">
                <div class="container py-sm-4 py-3">
                    <h4 class="abt-text text-capitalize text-sm-center mb-0"><?php the_title(); ?></h4>
                    <p class="color-white text-sm-center "><?php the_excerpt(); ?></p>
                    <div class="d-sm-flex justify-content-center">
                        <a href="<?php echo esc_url( get_permalink() ); ?>"
                        class="btn  mt-sm-4 mt-3 ml-3 mwa_link_bnr wow fadeInLeft">
						<?php esc_html_e( 'View More', 'astral' ); ?></a>
                    </div>
                </div>
            </div>
		<?php endwhile; endif; endif;
	}
}
$astral_about_Section = new astral_about_Section();