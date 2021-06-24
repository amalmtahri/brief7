<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'house_state_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','house-state' ),
	'description'       => esc_html__( 'Excerpt section options.', 'house-state' ),
	'panel'             => 'house_state_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'house_state_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'house_state_sanitize_number_range',
	'validate_callback' => 'house_state_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'house_state_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'house-state' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'house-state' ),
	'section'     		=> 'house_state_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
