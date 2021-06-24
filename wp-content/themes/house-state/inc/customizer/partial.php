<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage House State
* @since House State 1.0.0
*/

if ( ! function_exists( 'house_state_copyright_text_partial' ) ) :
    // blog btn title
    function house_state_copyright_text_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// slider section  btn txt
if ( ! function_exists( 'house_state_slider_btn_txt_partial' ) ) :
    function house_state_slider_btn_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['slider_btn_txt'] );
    }
endif;

// About section  btn txt
if ( ! function_exists( 'house_state_about_btn_txt_partial' ) ) :
    function house_state_about_btn_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['about_btn_txt'] );
    }
endif;

// Project section  btn txt
if ( ! function_exists( 'house_state_project_title_txt_partial' ) ) :
    function house_state_project_title_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['project_section_title'] );
    }
endif;

// team section  btn txt
if ( ! function_exists( 'house_state_team_title_txt_partial' ) ) :
    function house_state_team_title_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['team_section_title'] );
    }
endif;

// service section  btn txt
if ( ! function_exists( 'house_state_service_title_txt_partial' ) ) :
    function house_state_service_title_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['service_section_title'] );
    }
endif;

// service section  btn txt
if ( ! function_exists( 'house_state_blog_title_txt_partial' ) ) :
    function house_state_blog_title_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['blog_section_title'] );
    }
endif;

// service section  btn txt
if ( ! function_exists( 'house_state_blog_btn_txt_partial' ) ) :
    function house_state_blog_btn_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['blog_btn_txt'] );
    }
endif;


// counter section  btn txt
if ( ! function_exists( 'house_state_counter_title_txt_partial' ) ) :
    function house_state_counter_title_txt_partial() {
        $options = house_state_get_theme_options();
        return esc_html( $options['counter_section_title'] );
    }
endif;

