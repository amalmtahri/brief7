<?php
// /**
//  * Demo Import.
//  *
//  * This is the template that includes all the other files for core featured of Theme Palace
//  *
//  * @package Theme Palace
//  * @subpackage House State
//  * @sinceMega House State 1.0.0
//  */


function house_state_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Theme Palace Demo Import' , 'house-state' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'house_state_ctdi_plugin_page_setup' );


function house_state_ctdi_plugin_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for House State Theme.', 'house-state' ),
    esc_url( 'https://themepalace.com/instructions/themes/house-state' ), esc_html__( 'Click here for Demo File download', 'house-state' ) );
    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'house_state_ctdi_plugin_intro_text' );