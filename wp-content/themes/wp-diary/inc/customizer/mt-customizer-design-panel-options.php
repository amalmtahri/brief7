<?php
/**
 * WP Diary manage the Customizer options of design settings panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

// Radio Image field for archive/blog sidebar layout.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_archive_sidebar_layout',
		'label'    => esc_html__( 'Archive/Blog Sidebar Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_archive_settings',
		'default'  => 'no-sidebar',
		'priority' => 5,
		'choices'  => array(
			'left-sidebar'  	 => get_template_directory_uri() . '/assets/images/left-sidebar.png',
			'right-sidebar' 	 => get_template_directory_uri() . '/assets/images/right-sidebar.png',
			'no-sidebar'         => get_template_directory_uri() . '/assets/images/no-sidebar.png',
			'no-sidebar-center'  => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
		),
	)
);

// Radio Image field for arvhive/blog style.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_archive_style',
		'label'    => esc_html__( 'Archive/Blog Style', 'wp-diary' ),
		'section'  => 'wp_diary_section_archive_settings',
		'default'  => 'mt-archive--masonry-style',
		'priority' => 10,
		'choices'  => array(
			'mt-archive--classic-style'    => get_template_directory_uri() . '/assets/images/archive-classic.png',
			'mt-archive--block-grid-style' => get_template_directory_uri() . '/assets/images/archive-block-grid.png',
			'mt-archive--masonry-style'    => get_template_directory_uri() . '/assets/images/archive-masonry.png',
		),
	)
);

// Text filed for archive read more button.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'text',
		'settings' => 'wp_diary_archive_read_more',
		'label'    => esc_html__( 'Read More Button', 'wp-diary' ),
		'section'  => 'wp_diary_section_archive_settings',
		'default'  => esc_html__( 'Discover', 'wp-diary' ),
		'priority' => 15,
	)
);

// Radio Image field for single posts sidebar layout.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_posts_sidebar_layout',
		'label'    => esc_html__( 'Posts Sidebar Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_post_settings',
		'default'  => 'right-sidebar',
		'priority' => 5,
		'choices'  => array(
			'left-sidebar'  	 => get_template_directory_uri() . '/assets/images/left-sidebar.png',
			'right-sidebar' 	 => get_template_directory_uri() . '/assets/images/right-sidebar.png',
			'no-sidebar'         => get_template_directory_uri() . '/assets/images/no-sidebar.png',
			'no-sidebar-center'  => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
		),
	)
);

// Toggle field for Enable/Disable related posts.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_related_posts',
		'label'    => esc_html__( 'Enable Related Posts', 'wp-diary' ),
		'section'  => 'wp_diary_section_post_settings',
		'default'  => '1',
		'priority' => 15,
	)
);

// Radio Image field for single page sidebar layout.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_pages_sidebar_layout',
		'label'    => esc_html__( 'Pages Sidebar Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_page_settings',
		'default'  => 'right-sidebar',
		'priority' => 5,
		'choices'  => array(
			'left-sidebar'  	 => get_template_directory_uri() . '/assets/images/left-sidebar.png',
			'right-sidebar' 	 => get_template_directory_uri() . '/assets/images/right-sidebar.png',
			'no-sidebar'         => get_template_directory_uri() . '/assets/images/no-sidebar.png',
			'no-sidebar-center'  => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
		),
	)
);