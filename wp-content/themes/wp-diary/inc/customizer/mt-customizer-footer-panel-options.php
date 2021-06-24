<?php
/**
 * WP Diary manage the Customizer options of footer settings panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */


// Toggle field for Enable/Disable footer widget area.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_footer_widget_area',
		'label'    => esc_html__( 'Enable Footer Widget Area', 'wp-diary' ),
		'section'  => 'wp_diary_section_footer_widget_area',
		'default'  => '1',
		'priority' => 5,
	)
);

// Radio Image field for Widget Area layout
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_widget_area_layout',
		'label'    => esc_html__( 'Widget Area Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_footer_widget_area',
		'default'  => 'column-three',
		'priority' => 10,
		'choices'  => array(
			'column-four'  	 => get_template_directory_uri() . '/assets/images/footer-4.png',
			'column-three' 	 => get_template_directory_uri() . '/assets/images/footer-3.png',
			'column-two'     => get_template_directory_uri() . '/assets/images/footer-2.png',
			'column-one'  	 => get_template_directory_uri() . '/assets/images/footer-1.png'
		),
	)
);

// Toggle field for Enable/Disable footer menu.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_footer_menu',
		'label'    => esc_html__( 'Enable Footer Menu', 'wp-diary' ),
		'section'  => 'wp_diary_section_bottom_footer',
		'default'  => '1',
		'priority' => 5,
	)
);


// Text filed for copyright
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'text',
		'settings' => 'wp_diary_footer_copyright',
		'label'    => esc_html__( 'Copyright Text', 'wp-diary' ),
		'section'  => 'wp_diary_section_bottom_footer',
		'default'  => esc_html__( 'WP Diary', 'wp-diary' ),
		'priority' => 10,
	)
);