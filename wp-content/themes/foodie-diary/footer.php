<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP Diary
 * @subpackage Foodie Diary
 * @since 1.0.1
 */

?>
    </div> <!-- mt-container -->
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">

        <?php
            $wp_diary_footer_widget_option = get_theme_mod( 'wp_diary_enable_footer_widget_area', true );
            if ( true === $wp_diary_footer_widget_option ) {
                get_sidebar( 'footer' );
            }
        ?>
        <div id="bottom-footer">
            <div class="mt-container">
                <?php
                    $wp_diary_enable_footer_menu = get_theme_mod( 'wp_diary_enable_footer_menu', true );
                    if ( true === $wp_diary_enable_footer_menu ) {
                ?>
                        <nav id="footer-navigation" class="footer-navigation">
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'footer_menu',
                                    'menu_id'        => 'footer-menu',
                                    'fallback_cb'    => false,
                                    'depth'          => 1
                                ) );
                            ?>
                        </nav><!-- #footer-navigation -->
                <?php
                    }
                ?>
        
                <div class="site-info">
                    <span class="mt-copyright-text">
                        <?php 
                            $wp_diary_footer_copyright = get_theme_mod( 'wp_diary_footer_copyright' );
                            echo esc_html( $wp_diary_footer_copyright );
                        ?>
                    </span>
                    <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'foodie-diary' ), 'Foodie Diary', '<a href="'.esc_url( '//mysterythemes.com' ).'">Mystery Themes</a>' );
                        ?>
                </div><!-- .site-info -->
            </div>
        </div>
        
    </footer><!-- #colophon -->

    <?php

        /**
         * wp_diary_scroll_top hook
         *
         * @hooked - wp_diary_scroll_top_content - 10
         *
         * @since 1.0.0
         */
        do_action( 'wp_diary_scroll_top' );
    ?>
    
</div><!-- #page -->

<?php
    /**
     * wp_diary_after_page hook
     *
     * @since 1.0.0
     */
    do_action( 'wp_diary_after_page' );
?>

<?php wp_footer(); ?>

</body>
</html>