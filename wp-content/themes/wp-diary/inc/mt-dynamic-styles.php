<?php
/**
 * Dynamic styles
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 *
 */

add_action( 'wp_enqueue_scripts', 'wp_diary_dynamic_styles' );

if ( ! function_exists( 'wp_diary_dynamic_styles' ) ) :
    
    function wp_diary_dynamic_styles() {

    	$wp_diary_primary_color = get_theme_mod( 'wp_diary_primary_color', '#ec9fa1' );

    	$output_css = '';

        $output_css .= ".edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,.widget_search .search-submit,.widget_search .search-submit:hover,.mt-menu-search .mt-form-wrap .search-form .search-submit:hover,.menu-toggle:hover,.slider-btn,.entry-footer .mt-readmore-btn,article.sticky::before,.post-format-media--quote,.mt-gallery-slider .slick-prev.slick-arrow:hover,.mt-gallery-slider .slick-arrow.slick-next:hover,.wp_diary_social_media a:hover,.mt-header-extra-icons .sidebar-header.mt-form-close:hover,#site-navigation .mt-form-close{ background: ". esc_attr( $wp_diary_primary_color ) ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover ,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.mt-social-icon-wrap li a:hover,.site-title a:hover,.mt-sidebar-menu-toggle:hover,.mt-menu-search:hover,.sticky-header-sidebar-menu li a:hover,#site-navigation ul li a:hover,.slide-title a:hover,.entry-title a:hover,.cat-links a,.entry-title a:hover,.cat-links a:hover,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover,#top-footer .widget-title ,#footer-menu li a:hover,.wp_diary_latest_posts .mt-post-title a:hover,#mt-scrollup:hover,#site-navigation ul li:hover > a,#site-navigation ul li.current-menu-item > a,#site-navigation ul li.current-menu-ancestor > a, #site-navigation ul li.current_page_ancestor > a,#site-navigation ul li.current_page_item > a,#site-navigation ul li.focus > a{ color: ". esc_attr( $wp_diary_primary_color ) ."}\n";
        
        $output_css .= ".widget_search .search-submit,.widget_search .search-submit:hover,.no-thumbnail,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover ,#secondary .widget .widget-title,.mt-related-post-title,.error-404.not-found,.wp_diary_social_media a:hover{ border-color: ". esc_attr( $wp_diary_primary_color ) ."}\n";

        $refine_output_css = wp_diary_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'wp-diary-style', $refine_output_css );

    }

endif;