<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'house_state_single_post_section', array(
	'title'             => esc_html__( 'Single Post','house-state' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'house-state' ),
	'panel'             => 'house_state_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'house_state_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'house-state' ),
	'section'           => 'house_state_single_post_section',
	'on_off_label' 		=> house_state_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'house_state_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'house-state' ),
	'section'           => 'house_state_single_post_section',
	'on_off_label' 		=> house_state_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'house_state_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'house-state' ),
	'section'           => 'house_state_single_post_section',
	'on_off_label' 		=> house_state_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'house_state_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'house-state' ),
	'section'           => 'house_state_single_post_section',
	'on_off_label' 		=> house_state_hide_options(),
) ) );
