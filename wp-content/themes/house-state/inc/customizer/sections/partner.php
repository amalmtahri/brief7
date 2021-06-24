<?php
/**
 * partner Section options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add partner section
$wp_customize->add_section( 'house_state_partner_section', array(
	'title'             => esc_html__( 'partner','house-state' ),
	'description'       => esc_html__( 'partner Section options.', 'house-state' ),
	'panel'             => 'house_state_front_page_panel',
) );


// partner content enable control and setting
$wp_customize->add_setting( 'house_state_theme_options[partner_section_enable]', array(
	'default'			=> 	$options['partner_section_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[partner_section_enable]', array(
	'label'             => esc_html__( 'partner Section Enable', 'house-state' ),
	'section'           => 'house_state_partner_section',
	'on_off_label' 		=> house_state_switch_options(),
) ) );



for ( $i = 1; $i <= 6; $i++ ) :

	// partner pages drop down chooser control and setting
	$wp_customize->add_setting( 'house_state_theme_options[partner_content_page_'. $i .']', array(
		'sanitize_callback' => 'house_state_sanitize_page',
	) );

	$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[partner_content_page_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Page: %d', 'house-state'), $i ),
		'section'           => 'house_state_partner_section',
		'choices'			=> house_state_page_choices(),
		'active_callback'	=> 'house_state_is_partner_section_enable',
	) ) );

endfor;
