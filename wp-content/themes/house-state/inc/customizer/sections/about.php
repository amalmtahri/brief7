<?php
/**
 * about Section options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add about section
$wp_customize->add_section( 'house_state_about_section', array(
	'title'             => esc_html__( 'About','house-state' ),
	'description'       => esc_html__( 'About Section options.', 'house-state' ),
	'panel'             => 'house_state_front_page_panel',
) );

$wp_customize->add_setting(
	'house_state_about_section_setting',
	array(
		'sanitize_callback' => 'house_state_sanitize_select',
		'default' => 'setting'
	)
);


// about content enable control and setting
$wp_customize->add_setting( 'house_state_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'about Section Enable', 'house-state' ),
	'section'           => 'house_state_about_section',
	'on_off_label' 		=> house_state_switch_options(),
) ) );



// about pages drop down chooser control and setting
$wp_customize->add_setting( 'house_state_theme_options[about_content_page]', array(
	'sanitize_callback' => 'house_state_sanitize_page',
) );

$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[about_content_page]', array(
	'label'             => sprintf(esc_html__( 'Select Page', 'house-state') ),
	'section'           => 'house_state_about_section',
	'choices'			=> house_state_page_choices(),
	'active_callback'	=> 'house_state_is_about_section_enable',
) ) );

//about_btn_txt
$wp_customize->add_setting('house_state_theme_options[about_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['about_btn_txt'],
    )
);

$wp_customize->add_control('house_state_theme_options[about_btn_txt]',
    array(
        'section'			=> 'house_state_about_section',
        'label'				=> esc_html__( 'Button Text:', 'house-state' ),
        'type'          	=>'text',
        'active_callback' 	=> 'house_state_is_about_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[about_btn_txt]', array(
		'selector'            => '#about-us-fullwidth article div.read-more a',
		'settings'            => 'house_state_theme_options[about_btn_txt]',
		'fallback_refresh'    => true,
		'container_inclusive' => false,
 		'render_callback'     => 'house_state_about_btn_txt_partial',
    ) );
}


// blog btn url setting and control
$wp_customize->add_setting( 'house_state_theme_options[about_excerpt]', array(
	'sanitize_callback' => 'absint',
	'default'			=> $options['about_excerpt'],
) );

$wp_customize->add_control( 'house_state_theme_options[about_excerpt]', array(
	'label'           	=> esc_html__( 'about Excerpt', 'house-state' ),
	'section'        	=> 'house_state_about_section',
	'active_callback' 	=> 'house_state_is_about_section_enable',
	'type'				=> 'number',
) );
