<?php
/**
 * The Slider Section
 *
 * @package Astral
 */

/**
 * Class astral_Slider_Section
 */
class astral_Slider_Section extends astral_Abstract_Main {
	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_slider_area', array( $this, 'astral_slider' ) );
	}

	public function init() {

	}

	/**
	 * Slider section content.
	 *
	 * @since astral 0.1
	 */
	public function astral_slider() { 
	$post1 = get_theme_mod('astral_dropdown_pages_1');
	$post2 = get_theme_mod('astral_dropdown_pages_1');
	$post3 = get_theme_mod('astral_dropdown_pages_1');
	?>
	<?php if(get_theme_mod('astral_dropdown_pages_1')!='' || get_theme_mod('astral_dropdown_pages_2')!='' || get_theme_mod('astral_dropdown_pages_3')!='') {  ?>
    <div class="swiper-container" id="mwa_banner_slider">
        <div class="swiper-wrapper">
		<?php 
		$args = array( 
			'post_type' => 'page',
			'post_status'=>'publish', 
			'post__in' => array(get_theme_mod('astral_dropdown_pages_1'),get_theme_mod('astral_dropdown_pages_2'),get_theme_mod('astral_dropdown_pages_3')));
                


			$home_slide = new WP_Query( $args );
			if ( $home_slide->have_posts() ):
			while ( $home_slide->have_posts() ):
			$home_slide->the_post(); 
			if(has_post_thumbnail()) { ?>
            <div class="swiper-slide" style="background-image:url(<?php echo the_post_thumbnail_url(); ?>)">
                <div class="container banner-text">
                    <div class="slider-info wow fadeInLeft">
                        <h3><?php the_title(); ?></h3>
                        <span class="line"></span>
                        <p><?php the_excerpt(); ?></p>

                        <a target="_blank" class="btn mwa-theme mt-4 mwa_link_bnr scroll" href="<?php echo esc_url(get_permalink() ); ?>" role="button"><?php esc_html_e( 'View More', 'astral' ); ?></a>
                    </div>
                </div>
            </div>
			<?php }  endwhile; endif;  ?>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
<?php } }
}
$astral_Slider_Section = new astral_Slider_Section();