<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function house_state_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'house-state' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function house_state_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'house-state' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function house_state_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'house-state' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function house_state_product_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'house-state' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function house_state_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'house-state' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}




if ( ! function_exists( 'house_state_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function house_state_site_layout() {
        $house_state_site_layout = array(
            'wide'          => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout'  => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout'  => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'house_state_site_layout', $house_state_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'house_state_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function house_state_selected_sidebar() {
        $house_state_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'house-state' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'house-state' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'house-state' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'house-state' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'house-state' ),
        );

        $output = apply_filters( 'house_state_selected_sidebar', $house_state_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'house_state_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function house_state_global_sidebar_position() {
        $house_state_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'house_state_global_sidebar_position', $house_state_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'house_state_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function house_state_sidebar_position() {
        $house_state_sidebar_position = array(
            'right-sidebar'         => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'            => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'    => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'house_state_sidebar_position', $house_state_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'house_state_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function house_state_pagination_options() {
        $house_state_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'house-state' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'house-state' ),
        );

        $output = apply_filters( 'house_state_pagination_options', $house_state_pagination_options );

        return $output;
    }
endif;



if ( ! function_exists( 'house_state_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function house_state_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'house-state' ),
            'off'       => esc_html__( 'Disable', 'house-state' )
        );
        return apply_filters( 'house_state_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'house_state_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function house_state_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'house-state' ),
            'off'       => esc_html__( 'No', 'house-state' )
        );
        return apply_filters( 'house_state_hide_options', $arr );
    }
endif;
