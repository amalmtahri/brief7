<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */

if ( ! is_active_sidebar( 'footer-sidebar' ) &&
    ! is_active_sidebar( 'footer-sidebar-2' ) &&
    ! is_active_sidebar( 'footer-sidebar-3' ) &&
    ! is_active_sidebar( 'footer-sidebar-4' ) ) {
    return;
}

$wp_diary_widget_area_layout = get_theme_mod( 'wp_diary_widget_area_layout', 'column-three' );

?>

<div id="top-footer" class="footer-widgets-wrapper footer-<?php echo esc_attr( $wp_diary_widget_area_layout ); ?> mt-clearfix">
    <div class="mt-container">
        <div class="footer-widgets-area mt-clearfix">
            <div class="mt-footer-widget-wrapper mt-column-wrapper mt-clearfix">

                <div class="mt-footer-widget wow fadeInLeft" data-wow-duration="0.5s">
                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>

                <?php if ( $wp_diary_widget_area_layout != 'column-one' ) { ?>
                    <div class="mt-footer-widget wow fadeInLeft" data-woww-duration="1s">
                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                    </div>
                <?php } ?>

                <?php if ( $wp_diary_widget_area_layout == 'column-three' || $wp_diary_widget_area_layout == 'column-four' ) { ?>
                    <div class="mt-footer-widget wow fadeInLeft" data-wow-duration="1.5s">
                        <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                    </div>
                <?php } ?>

                <?php if ( $wp_diary_widget_area_layout == 'column-four' ) { ?>
                    <div class="mt-footer-widget wow fadeInLeft" data-wow-duration="2s">
                        <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                    </div>
                <?php } ?>

            </div><!-- .mt-footer-widget-wrapper -->
        </div><!-- .footer-widgets-area -->
    </div><!-- .mt-container -->
</div><!-- .footer-widgets-wrapper -->