<?php
/**
 * The Blog Section
 *
 * @package Astral
 */

/**
 * Class astral_Blog_Section
 */
class astral_Blog_Section extends astral_Abstract_Main {
	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_blog_area', array( $this, 'astral_blog' ) );
	}

	public function init() {

	}

	/**
	 * Slider section content.
	 *
	 * @since astral 0.1
	 */
	function astral_blog() {
	$astral_blog_title = get_theme_mod( 'astral_blog_title' );
	$astral_blog_desc  = get_theme_mod( 'astral_blog_desc' );
	if ( get_theme_mod( 'astral_blog_show', '1' ) ) :
	?>
    <section class="align-blog front-blog" id="blog">
        <div class="container">
            <div class="mwa_title text-center">
                <h4 class="mwa-title"><?php echo esc_html( $astral_blog_title ); ?></h4>
                <p class="sub-title"><?php echo esc_html( $astral_blog_desc ); ?></p>
            </div>
            <div class="container space-sec">
                <div class="swiper-container" id="mwa_blog_slider">
                    <div class="swiper-wrapper">
						<?php if ( have_posts() ) :
						$posts_count = wp_count_posts()->publish; $args = array( 'post_type'           => 'post','posts_per_page'      => $posts_count, 'ignore_sticky_posts' => 1 );
						$post_type_data = new WP_Query( $args );
						while ( $post_type_data->have_posts() ): $post_type_data->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="card h-100 wow bounceInRight">
                                <div class="card-header p-0  position-relative">
									<span class="blog-date"><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
									</span>
									<a title="<?php the_title_attribute(); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
									<?php if ( has_post_thumbnail() ) :
										the_post_thumbnail(); endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog_link"><?php esc_html_e( 'Read more', 'astral' ); ?></a>
                                </div>
                            </div>
                        </div>
					<?php endwhile; endif; ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
<?php endif;
	}
}
$astral_Blog_Section = new astral_Blog_Section();