<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of House State
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

/*
 * Add About  widget
 */
require get_template_directory() . '/inc/widgets/about-info-widget.php';

/*
 * Add Instagram  widget
 */
require get_template_directory() . '/inc/widgets/instagram.php';


/**
 * Register widgets
 */
function house_state_register_widgets() {

	register_widget( 'house_state_About_Us_Image_Widget' );

	register_widget( 'house_state_Instagram_Widget' );


}
add_action( 'widgets_init', 'house_state_register_widgets' );