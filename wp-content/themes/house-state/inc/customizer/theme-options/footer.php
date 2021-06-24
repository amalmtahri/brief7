<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'house_state_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'house-state' ),
		'priority'   			=> 900,
		'panel'      			=> 'house_state_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'house_state_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'house_state_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);

$wp_customize->add_control( 'house_state_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'house-state' ),
		'section'    			=> 'house_state_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[copyright_text]', array(
		'selector'            => '.site-info .wrapper',
		'settings'            => 'house_state_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'house_state_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'house_state_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'house_state_sanitize_switch_control',
	)
);
$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'house-state' ),
		'section'    		=> 'house_state_section_footer',
		'on_off_label' 		=> house_state_switch_options(),
    )
) );