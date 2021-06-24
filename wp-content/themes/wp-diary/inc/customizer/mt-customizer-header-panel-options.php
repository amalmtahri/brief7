<?php
/**
 * WP Diary manage the Customizer options of header panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

// Toggle field for Enable/Disable sticky menu.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_sticky_menu',
		'label'    => esc_html__( 'Enable Sticky Menu', 'wp-diary' ),
		'section'  => 'wp_diary_section_header_extra',
		'default'  => '1',
		'priority' => 5,
	)
);


// Toggle field for Enable/Disable sidebar menu icon.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_sidebar_menu_icon',
		'label'    => esc_html__( 'Enable Sidebar Menu Icon', 'wp-diary' ),
		'section'  => 'wp_diary_section_header_extra',
		'default'  => '1',
		'priority' => 15,
	)
);


// Toggle field for Enable/Disable search icon.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_search_icon',
		'label'    => esc_html__( 'Enable Search Icon', 'wp-diary' ),
		'section'  => 'wp_diary_section_header_extra',
		'default'  => '1',
		'priority' => 20,
	)
);