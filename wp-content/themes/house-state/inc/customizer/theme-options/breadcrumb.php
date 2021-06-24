<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

$wp_customize->add_section( 'house_state_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','house-state' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'house-state' ),
	'panel'             => 'house_state_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'house_state_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'house_state_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'house-state' ),
	'section'          	=> 'house_state_breadcrumb',
	'on_off_label' 		=> house_state_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'house_state_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'house_state_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'house-state' ),
	'active_callback' 	=> 'house_state_is_breadcrumb_enable',
	'section'          	=> 'house_state_breadcrumb',
) );
