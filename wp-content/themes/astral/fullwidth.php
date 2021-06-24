<?php
/**
 * Template Name: Page With Full Width 
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
    <section class="align-page-full" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 single-left mt-lg-0 mt-4">
                    <div class="single-left1">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							get_template_part( 'post', 'page' );
						endwhile;
						endif;
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer(); 