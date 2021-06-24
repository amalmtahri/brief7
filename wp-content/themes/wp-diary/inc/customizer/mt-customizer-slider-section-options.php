<?php
/**
 * WP Diary manage the Customizer options of slider section.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

// Toggle field for Enable/Disable slider section.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_slider',
		'label'    => esc_html__( 'Enable Slider Section', 'wp-diary' ),
		'section'  => 'wp_diary_section_slider',
		'default'  => '1',
		'priority' => 5,
	)
);


// Select field for slider category
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'select',
		'settings' => 'wp_diary_slider_cat',
		'label'    => esc_html__( 'Slider Category', 'wp-diary' ),
		'section'  => 'wp_diary_section_slider',
		'default'  => '',
		'priority' => 10,
		'choices'  => wp_diary_select_categories_list(),
		'active_callback' => array(
			array(
				'setting'  => 'wp_diary_enable_slider',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);


// Text filed for slide read more button
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'text',
		'settings' => 'wp_diary_slider_read_more',
		'label'    => esc_html__( 'Read More Button', 'wp-diary' ),
		'section'  => 'wp_diary_section_slider',
		'default'  => esc_html__( 'Discover', 'wp-diary' ),
		'priority' => 15,
		'active_callback' => array(
			array(
				'setting'  => 'wp_diary_enable_slider',
				'value'    => true,
				'operator' => 'in',
			),
		)
	)
);