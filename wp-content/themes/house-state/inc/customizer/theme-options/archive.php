<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'house_state_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','house-state' ),
	'description'       => esc_html__( 'Archive section options.', 'house-state' ),
	'panel'             => 'house_state_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'house_state_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'house_state_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'house-state' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'house-state' ),
	'section'           => 'house_state_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'house_state_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'house_state_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'house-state' ),
	'section'           => 'house_state_archive_section',
	'on_off_label' 		=> house_state_hide_options(),
) ) );