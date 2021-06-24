<?php
/**
 * The Service Section
 *
 * @package Astral
 */

/**
 * Class astral_Service_Section
 */
class astral_Service_Section extends astral_Abstract_Main {

	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_service_area', array( $this, 'astral_service' ) );
	}

	public function init() {
	}

	function astral_service() {
		$astral_service_title = get_theme_mod( 'astral_service_title' );
		$astral_service_desc  = get_theme_mod( 'astral_service_desc' );
		if ( get_theme_mod( 'astral_service_show' ) ) : ?>
        <section class="align-about" id="about">
            <div class="container">
                <div class="mwa_title text-center">
                    <h4 class="mwa-title"><?php echo esc_html( $astral_service_title ); ?></h4>
                    <p class="sub-title"><?php echo esc_html( $astral_service_desc ); ?></p>
                </div>
                <div class="row">
				<?php 
				if(get_theme_mod('astral_service_1')!='' || get_theme_mod('astral_service_2')!='' || get_theme_mod('astral_service_3')!='') {
				$args = array( 
				'post_type' => 'post',
				'ignore_sticky_posts' => 1,
				'post__in' => array(get_theme_mod('astral_service_1'),get_theme_mod('astral_service_2'),get_theme_mod('astral_service_3')));
				$home_service = new WP_Query( $args );
                
				if ( $home_service->have_posts() ):
				while ( $home_service->have_posts() ):
				$home_service->the_post(); 
				?>
                    <div class="col-lg-4 col-sm-6 wow bounceInLeft">
                        <div class="abt-grid">
                            <div class="row">
                                <div class="col-12">
									<div class="abt-icon">
                                        <img src="<?php echo the_post_thumbnail_url(); ?>">
                                    </div>
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="abt-txt">
                                        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php the_title(); ?></a>
                                        </h4>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php endwhile; endif; } ?>
                </div>
            </div>
        </section>
		<?php endif;
	}
}
$astral_Service_Section = new astral_Service_Section();