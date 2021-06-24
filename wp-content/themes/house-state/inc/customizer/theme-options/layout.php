<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'house_state_layout', array(
	'title'               => esc_html__('Layout','house-state'),
	'description'         => esc_html__( 'Layout section options.', 'house-state' ),
	'panel'               => 'house_state_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'house_state_theme_options[site_layout]', array(
	'sanitize_callback'   => 'house_state_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new House_State_Custom_Radio_Image_Control ( $wp_customize, 'house_state_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'house-state' ),
	'section'             => 'house_state_layout',
	'choices'			  => house_state_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'house_state_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'house_state_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new House_State_Custom_Radio_Image_Control ( $wp_customize, 'house_state_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'house-state' ),
	'section'             => 'house_state_layout',
	'choices'			  => house_state_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'house_state_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'house_state_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new House_State_Custom_Radio_Image_Control ( $wp_customize, 'house_state_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'house-state' ),
	'section'             => 'house_state_layout',
	'choices'			  => house_state_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'house_state_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'house_state_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new House_State_Custom_Radio_Image_Control( $wp_customize, 'house_state_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'house-state' ),
	'section'             => 'house_state_layout',
	'choices'			  => house_state_sidebar_position(),
) ) );