<?php
/**
 * service Section options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add service section
$wp_customize->add_section( 'house_state_service_section', array(
	'title'             => esc_html__( 'Service','house-state' ),
	'description'       => esc_html__( 'Service Section options.', 'house-state' ),
	'panel'             => 'house_state_front_page_panel',
) );


// service content enable control and setting
$wp_customize->add_setting( 'house_state_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'service Section Enable', 'house-state' ),
	'section'           => 'house_state_service_section',
	'on_off_label' 		=> house_state_switch_options(),
) ) );


$wp_customize->add_setting( 'house_state_theme_options[service_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_section_title'],
	'transport'			=>'refresh'
) );

$wp_customize->add_control('house_state_theme_options[service_section_title]', array(
	'label'             =>  esc_html__( 'Section Title', 'house-state' ),
	'section'           => 'house_state_service_section',
	'type'              => 'text',
	'active_callback'	=> 'house_state_is_service_section_enable',
));

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[service_section_title]', array(
		'selector'            => '#services-section .section-header .section-title',
		'settings'            => 'house_state_theme_options[service_section_title]',
		'fallback_refresh'    => true,
		'container_inclusive' => false,
 		'render_callback'     => 'house_state_service_title_txt_partial',
    ) );
}




for ( $i = 1; $i <= 6; $i++ ) :

	$wp_customize->add_setting( 'house_state_theme_options[service_content_icon_' . $i . ']', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new House_State_Icon_Picker( $wp_customize, 'house_state_theme_options[service_content_icon_' . $i . ']', array(
			'label'             => sprintf( esc_html__( 'Select Icon %d', 'house-state' ), $i ),
			'section'           => 'house_state_service_section',
			'active_callback'	=> 'house_state_is_service_section_enable',
		) ) );
	

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'house_state_theme_options[service_content_page_'. $i .']', array(
		'sanitize_callback' => 'house_state_sanitize_page',
	) );

	$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[service_content_page_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Page: %d', 'house-state'), $i ),
		'section'           => 'house_state_service_section',
		'choices'			=> house_state_page_choices(),
		'active_callback'	=> 'house_state_is_service_section_enable',
	) ) );


endfor;

//style

$wp_customize->add_setting( 'house_state_theme_options[style_service_overlay_color]', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'			=> 'refresh'

	) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'house_state_theme_options[style_service_overlay_color]', array(
	'label'             => esc_html__( 'Overlay Color', 'house-state' ),
	'section'           => 'house_state_service_section',
	) ) );

$wp_customize->add_setting( 'house_state_theme_options[style_service_overlay_value]', array(
	'default'          	=> 3,
	'sanitize_callback' => 'house_state_sanitize_number_range',
) );

$wp_customize->add_control( 'house_state_theme_options[style_service_overlay_value]', array(
	'label'             => esc_html__( 'Overlay Value', 'house-state' ),
	'description'       => esc_html__( 'Note: Min 0 & Max 10. Please input the valid number and save. Then refresh the page to see the change.', 'house-state' ),
	'section'           => 'house_state_service_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		'style' => 'width: 100px;'
		),
) );

$wp_customize->add_setting( 'house_state_theme_options[style_service_background]', array(
	'sanitize_callback' => 'house_state_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'house_state_theme_options[style_service_background]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'house-state' ),
		'section'     		=> 'house_state_service_section',
) ) );

$wp_customize->add_setting( 'house_state_theme_options[style_service_background_color]', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'transport'			=> 'refresh'
	) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'house_state_theme_options[style_service_background_color]', array(
	'label'             => esc_html__( 'Background Color', 'house-state' ),
	'section'           => 'house_state_service_section',
	) ) );
