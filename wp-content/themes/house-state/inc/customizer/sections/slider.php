<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'house_state_slider_section', array(
	'title'             => esc_html__( 'Slider','house-state' ),
	'description'       => esc_html__( 'Slider Section options.', 'house-state' ),
	'panel'             => 'house_state_front_page_panel',
) );


// Slider content enable control and setting
$wp_customize->add_setting( 'house_state_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'house-state' ),
	'section'           => 'house_state_slider_section',
	'on_off_label' 		=> house_state_switch_options(),
) ) );



for ( $i = 1; $i <= 3; $i++ ) :

		
	// slider section title control and setting
	$wp_customize->add_setting( 'house_state_theme_options[slider_section_sub_title_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['slider_section_sub_title'],
		'transport'			=>'refresh'
	) );

	$wp_customize->add_control('house_state_theme_options[slider_section_sub_title_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Section Sub Title %d', 'house-state' ), $i),
		'section'           => 'house_state_slider_section',
		'type'              =>'text',
		'active_callback'	=> 'house_state_is_slider_section_enable',
	));

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'house_state_theme_options[slider_content_page_'. $i .']', array(
		'sanitize_callback' => 'house_state_sanitize_page',
	) );

	$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[slider_content_page_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Page: %d', 'house-state'), $i ),
		'section'           => 'house_state_slider_section',
		'choices'			=> house_state_page_choices(),
		'active_callback'	=> 'house_state_is_slider_section_enable',
	) ) );

	//house_state_Customize_Horizontal_Line
    $wp_customize->add_setting('house_state_theme_options[slider_separator'. $i .']',array(
       'sanitize_callback'      => 'house_state_sanitize_html',
    ));

    $wp_customize->add_control(new House_State_Customize_Horizontal_Line($wp_customize,'house_state_theme_options[slider_separator'. $i .']',array(
        'active_callback'	=> 'house_state_is_slider_section_enable',
        'type'                  =>'hr',
        'section'               =>'house_state_slider_section',
    )));

endfor;



$wp_customize->add_control('house_state_theme_options[slider_btn_txt]',
    array(
        'section'			=> 'house_state_slider_section',
        'label'				=> esc_html__( 'Button Text:', 'house-state' ),
        'type'          	=>'text',
        'active_callback' 	=> 'house_state_is_slider_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[slider_btn_txt]', array(
		'selector'            => '#featured-slider-section article div.read-more a',
		'settings'            => 'house_state_theme_options[slider_btn_txt]',
		'fallback_refresh'    => true,
		'container_inclusive' => false,
 		'render_callback'     => 'house_state_slider_btn_txt_partial',
    ) );
}


// blog btn url setting and control
$wp_customize->add_setting( 'house_state_theme_options[slider_excerpt]', array(
	'sanitize_callback' => 'absint',
	'default'			=> $options['slider_excerpt'],
) );

$wp_customize->add_control( 'house_state_theme_options[slider_excerpt]', array(
	'label'           	=> esc_html__( 'Slider Excerpt', 'house-state' ),
	'section'        	=> 'house_state_slider_section',
	'active_callback' 	=> 'house_state_is_slider_section_enable',
	'type'				=> 'number',
) );


//slider Style

$wp_customize->add_setting( 'house_state_theme_options[style_slider_overlay_enable]', array(
	'default'			=> 	$options['style_slider_overlay_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[style_slider_overlay_enable]', array(
	'label'             => esc_html__( 'Slider Overlay Enable', 'house-state' ),
	'section'           => 'house_state_slider_section',
	'on_off_label' 		=> house_state_switch_options(),
	'active_callback' 	=> 'house_state_is_slider_section_enable',
) ) );

