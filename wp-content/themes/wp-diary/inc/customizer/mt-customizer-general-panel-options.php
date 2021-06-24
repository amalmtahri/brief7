<?php
/**
 * WP Diary manage the Customizer options of general panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

// Toggle field for Enable/Disable wow animation.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_wow_animation',
		'label'    => esc_html__( 'Enable Wow Animation', 'wp-diary' ),
		'section'  => 'wp_diary_section_site',
		'default'  => '1',
		'priority' => 5,
	)
);


// Radio Image field for Site layout
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_site_layout',
		'label'    => esc_html__( 'Site Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_site',
		'default'  => 'site-layout--wide',
		'priority' => 5,
		'choices'  => array(
			'site-layout--wide'   => get_template_directory_uri() . '/assets/images/full-width.png',
			'site-layout--boxed'  => get_template_directory_uri() . '/assets/images/boxed-layout.png'
		),
	)
);

// Color Picker field for Primary Color
Kirki::add_field( 
	'wp_diary_config', array(
		'type'        => 'color',
		'settings'    => 'wp_diary_primary_color',
		'label'       => __( 'Primary Color', 'wp-diary' ),
		'section'     => 'colors',
		'default'     => '#ec9fa1',
	)
);