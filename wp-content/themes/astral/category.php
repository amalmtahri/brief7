<?php
/**
 * The template for displaying category pages
 *
 * @package Astral
 * @since 0.1
 */
get_header();
do_action( 'astral_top_banner' ); 
/* breadcrumbs */
if( get_theme_mod( 'astral_breadcrumb_toggle','1' ) ) : ?>
    <nav aria-label="breadcrumb">
		<?php if ( have_posts() ) { ?>
            <ol class="breadcrumb d-flex justify-content-center">
                <li class="breadcrumb-item">
                    <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'astral' ); ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php single_cat_title(); ?></li>
            </ol>
		<?php } ?>
    </nav>
    <!-- //breadcrumbs -->
<?php endif; ?>
    <!-- blog post-->
    <section class="align-blog" id="blog">
        <div class="container">
            <div class="row">
                <!-- left side -->
                <div class="col-lg-8 single-left mt-lg-0 mt-4">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
						get_template_part( 'post', 'content' );
					endwhile;
					endif;
					/*
					* Functions hooked into astral_pagination action
					*
					* @hooked astral_navigation
					*/
					do_action( 'astral_pagination' );
					?>
                </div>
                <!-- right side -->
                <div class="col-lg-4 event-right">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- //blog post -->
<?php
get_footer();