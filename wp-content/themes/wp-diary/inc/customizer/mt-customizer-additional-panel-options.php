<?php
/**
 * WP Diary manage the Customizer options of additional panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */


// Repeater field for social icons
Kirki::add_field( 
	'wp_diary_config', array(
		'type'        	=> 'repeater',
		'label'       	=> esc_html__( 'Add Social Icons', 'wp-diary' ),
		'description' 	=> esc_html__( 'Drag & Drop items to re-arrange the order', 'wp-diary' ),
		'section'     	=> 'wp_diary_section_social_icons',
		'priority'		=> 5,
		'choices'		=> array(
			'limit'		=> 5
		),
		'row_label'   	=> array(
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'wp-diary' ),
			'field' => 'social_icon',
		),
		'settings'    => 'wp_diary_social_icons_lists',
		'default'     => array(
			array(
				'social_icon' => 'facebook',
				'social_url'  => '#',
			),
			array(
				'social_icon' => 'twitter',
				'social_url'  => '#',
			),
		),
		'fields'      => array(
			'social_icon' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Social Icon', 'wp-diary' ),
				'default' => 'facebook',
				'choices' => wp_diary_get_fontawesome_social_icons_array(),
			),
			'social_url'  => array(
				'type'    => 'link',
				'label'   => esc_html__( 'Social Link URL', 'wp-diary' ),
				'default' => '',
			),
		),
	)
);


// Toggle field for Enable/Disable breadcrumbs.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_breadcrumb_option',
		'label'    => esc_html__( 'Enable Breadcrumbs', 'wp-diary' ),
		'section'  => 'wp_diary_section_breadcrumbs',
		'default'  => '1',
		'priority' => 5,
	)
);

// Toggle field for Enable/Disable prettyphoto in post/page gallery.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_prettyphoto_gallery',
		'label'    => esc_html__( 'Enable Prettyphoto in Post/Page Gallery', 'wp-diary' ),
		'section'  => 'wp_diary_section_prettyphoto',
		'default'  => '1',
		'priority' => 10,
	)
);