<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

get_header(); 
$options = house_state_get_theme_options();
?>

<div id="inner-content-wrapper" class="wrapper page-section">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="section-content archive-blog-wrapper  clear">
                <?php
                if ( have_posts() ) : ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile;

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>
            </div>
            <?php  
            /**
            * Hook - house_state_action_pagination.
            *
            * @hooked house_state_pagination 
            */
            do_action( 'house_state_action_pagination' ); 

            /**
            * Hook - house_state_infinite_loader_spinner_action.
            *
            * @hooked house_state_infinite_loader_spinner 
            */
            do_action( 'house_state_infinite_loader_spinner_action' );
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

    <?php  
    if ( house_state_is_sidebar_enable() ) {
        get_sidebar();
    }
    ?>
</div><!-- .wrapper -->

<?php
get_footer();
