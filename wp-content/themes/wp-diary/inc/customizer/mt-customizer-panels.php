<?php
/**
 * WP Diary manage the Customizer panels
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'wp_diary_general_panel', array(
	'priority' => 10,
	'title'    => esc_html__( 'General Settings', 'wp-diary' ),
) );


/**
 * Header Settings Panel
 */
Kirki::add_panel( 'wp_diary_header_panel', array(
	'priority' => 15,
	'title'    => esc_html__( 'Header Settings', 'wp-diary' ),
) );


/**
 * Design Settings Panel
 */
Kirki::add_panel( 'wp_diary_design_panel', array(
	'priority' => 35,
	'title'    => esc_html__( 'Design Settings', 'wp-diary' ),
) );


/**
 * Additional Features Panel
 */
Kirki::add_panel( 'wp_diary_additional_panel', array(
	'priority' => 40,
	'title'    => esc_html__( 'Additional Features', 'wp-diary' ),
) );

/**
 * Footer Settings Panel
 */
Kirki::add_panel( 'wp_diary_footer_panel', array(
	'priority' => 45,
	'title'    => esc_html__( 'Footer Settings', 'wp-diary' ),
) );