<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'house_state_reset_section', array(
	'title'             => esc_html__('Reset all settings','house-state'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'house-state' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'house_state_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'house_state_sanitize_checkbox',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'house_state_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'house-state' ),
	'section'           => 'house_state_reset_section',
	'type'              => 'checkbox',
) );
