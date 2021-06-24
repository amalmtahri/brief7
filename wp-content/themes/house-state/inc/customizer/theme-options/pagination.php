<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'house_state_pagination', array(
	'title'               	=> esc_html__('Pagination','house-state'),
	'description'         	=> esc_html__( 'Pagination section options.', 'house-state' ),
	'panel'               	=> 'house_state_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'house_state_theme_options[pagination_enable]', array(
	'sanitize_callback' 	=> 'house_state_sanitize_switch_control',
	'default'             	=> $options['pagination_enable'],
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[pagination_enable]', array(
	'label'               	=> esc_html__( 'Pagination Enable', 'house-state' ),
	'section'             	=> 'house_state_pagination',
	'on_off_label' 			=> house_state_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'house_state_theme_options[pagination_type]', array(
	'sanitize_callback'   	=> 'house_state_sanitize_select',
	'default'             	=> $options['pagination_type'],
) );

$wp_customize->add_control( 'house_state_theme_options[pagination_type]', array(
	'label'               	=> esc_html__( 'Pagination Type', 'house-state' ),
	'section'             	=> 'house_state_pagination',
	'type'                	=> 'select',
	'choices'			  	=> house_state_pagination_options(),
	'active_callback'	  	=> 'house_state_is_pagination_enable',
) );
