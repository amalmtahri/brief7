<?php
/**
 * Template Name: About Us
 *
 * @package Astral
 */
get_header();
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb_area
*/
if( get_theme_mod( 'astral_breadcrumb_toggle','1' ) ) :
do_action( 'astral_breadcrumb_area' ); 
endif;
?>
    <section class="align-blog blog_page" id="blog">
        <div class="container">
            <div class="row">
                <!-- right side -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                    if(has_post_thumbnail()) {
                    ?>
                <div class="col-lg-6 single-left mt-lg-0 mt-4">
                    <div class="single-left1">
                        <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'blog-thumb' );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 single-left mt-lg-0 mt-4">
                    <div class="single-left1">
                        <h3 class="card-title">
                            <?php the_title(); ?>
                        </h3>
						<?php
						the_content( __( 'Read More', 'astral' ) );
						?>
                    </div>
                </div>
                <?php } else { ?>
                <div class="col-lg-12 single-left mt-lg-0 mt-4">
                    <div class="single-left1">
                        <h3 class="card-title">
                            <?php the_title(); ?>
                        </h3>
                        <?php
                        the_content( __( 'Read More', 'astral' ) );
                        ?>
                    </div>
                </div>
                <?php } ?>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
<?php 
get_footer();