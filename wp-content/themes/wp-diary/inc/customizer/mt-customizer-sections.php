<?php
/**
 * WP Diary manage the Customizer sections
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/**
 * Site Settings
 */
Kirki::add_section( 'wp_diary_section_site', array(
	'title'    => esc_html__( 'Site Settings', 'wp-diary' ),
	'panel'    => 'wp_diary_general_panel',
	'priority' => 40,
) );


/**
 * Header Extra Options
 */
Kirki::add_section( 'wp_diary_section_header_extra', array(
	'title'    => esc_html__( 'Extra Options', 'wp-diary' ),
	'panel'    => 'wp_diary_header_panel',
	'priority' => 15,
) );


/**
 * Slider Settings
 */
Kirki::add_section( 'wp_diary_section_slider', array(
	'title'    => esc_html__( 'Slider Settings', 'wp-diary' ),
	'priority' => 20,
) );


/**
 * Archive Settings
 */
Kirki::add_section( 'wp_diary_section_archive_settings', array(
	'title'    => esc_html__( 'Archive Settings', 'wp-diary' ),
	'panel'    => 'wp_diary_design_panel',
	'priority' => 5,
) );


/**
 * Post Settings
 */
Kirki::add_section( 'wp_diary_section_post_settings', array(
	'title'    => esc_html__( 'Post Settings', 'wp-diary' ),
	'panel'    => 'wp_diary_design_panel',
	'priority' => 10,
) );


/**
 * Page Settings
 */
Kirki::add_section( 'wp_diary_section_page_settings', array(
	'title'    => esc_html__( 'Page Settings', 'wp-diary' ),
	'panel'    => 'wp_diary_design_panel',
	'priority' => 15,
) );


/**
 * Social Icons
 */
Kirki::add_section( 'wp_diary_section_social_icons', array(
	'title'    => esc_html__( 'Social Icons', 'wp-diary' ),
	'panel'    => 'wp_diary_additional_panel',
	'priority' => 5,
) );


/**
 * Breadcrumbs
 */
Kirki::add_section( 'wp_diary_section_breadcrumbs', array(
	'title'    => esc_html__( 'Breadcrumbs', 'wp-diary' ),
	'panel'    => 'wp_diary_additional_panel',
	'priority' => 10,
) );

/**
 * PrettyPhoto Setting
 */
Kirki::add_section( 'wp_diary_section_prettyphoto', array(
	'title'    => esc_html__( 'PrettyPhoto Setting', 'wp-diary' ),
	'panel'    => 'wp_diary_additional_panel',
	'priority' => 20,
) );


/**
 * Footer Widget Area
 */
Kirki::add_section( 'wp_diary_section_footer_widget_area', array(
	'title'    => esc_html__( 'Footer Widget Area', 'wp-diary' ),
	'panel'    => 'wp_diary_footer_panel',
	'priority' => 5,
) );


/**
 * Bottom footer
 */
Kirki::add_section( 'wp_diary_section_bottom_footer', array(
	'title'    => esc_html__( 'Bottom Footer', 'wp-diary' ),
	'panel'    => 'wp_diary_footer_panel',
	'priority' => 10,
) );