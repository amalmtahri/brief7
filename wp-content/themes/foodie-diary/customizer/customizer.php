<?php
/**
 * Foodie Diary functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP Diary
 * @subpackage Foodie Diary
 * @since 1.0.0
 */

/**---------------------------------------------------------------------------------------------------------------------------------------*/

add_action( 'init', 'foodie_diary_custom_fields' );

function foodie_diary_custom_fields() {

	/**
	 * Top Header
	 */
	Kirki::add_section( 'foodie_diary_section_top_header', array(
		'title'    => esc_html__( 'Top Header', 'foodie-diary' ),
		'panel'    => 'wp_diary_header_panel',
		'priority' => 2,
	) );

	// Enable/Disable top header
	Kirki::add_field(
		'wp_diary_config', array(
			'type'     => 'toggle',
			'settings' => 'foodie_diary_enable_top_header',
			'label'    => esc_html__( 'Enable Top Header', 'foodie-diary' ),
			'section'  => 'foodie_diary_section_top_header',
			'default'  => '0',
			'priority' => 5,
		)
	);

	// Text filed for top header element - phone
	Kirki::add_field(
		'wp_diary_config', array(
			'type'     => 'text',
			'settings' => 'foodie_diary_top_header_phone',
			'label'    => esc_html__( 'Contact Number', 'foodie-diary' ),
			'section'  => 'foodie_diary_section_top_header',
			'default'  => esc_html__( '(541) 754-3010', 'foodie-diary' ),
			'priority' => 10,
			'transport'       => 'postMessage',
			'js_vars'         => array(
				array(
					'element'  => '',
					'function' => 'html',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'foodie_diary_enable_top_header',
					'operator' => 'in',
					'value'    => '1',
				),
			),
		)
	);

	// Text filed for top header element - email.
	Kirki::add_field(
		'wp_diary_config', array(
			'type'            => 'text',
			'settings'        => 'foodie_diary_top_header_email',
			'label'           => esc_html__( 'Email Address', 'foodie-diary' ),
			'section'         => 'foodie_diary_section_top_header',
			'default'         => 'example@example.com',
			'priority' 		  => 15,
			'transport'       => 'postMessage',
			'sanitize_callback'	=> 'sanitize_email',
			'js_vars'         => array(
				array(
					'element'  => '',
					'function' => 'html',
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'foodie_diary_enable_top_header',
					'operator' => 'in',
					'value'    => '1',
				),
			),
		)
	);

	/**
	 * Change theme default color
	 * Color Picker field for Primary Color
	 *
	 */ 

	Kirki::add_field(
		'wp_diary_config', array(
			'type'        => 'color',
			'settings'    => 'wp_diary_primary_color',
			'label'       => __( 'Primary Color', 'foodie-diary' ),
			'section'     => 'colors',
			'default'     => '#3cbbcc',
		)
	);

	/**
	 * Featured Section
	 */
	Kirki::add_section( 'foodie_diary_section_featured_items', array(
		'title'    => esc_html__( 'Featured Section', 'foodie-diary' ),
		'priority' => 15,
	) );

	// Repeater field for featured items
	Kirki::add_field(
		'wp_diary_config', array(
			'type'        	=> 'repeater',
			'label'       	=> esc_html__( 'Featured Items', 'foodie-diary' ),
			'description' 	=> esc_html__( 'Drag & Drop items to re-arrange the order', 'foodie-diary' ),
			'section'     	=> 'foodie_diary_section_featured_items',
			'priority'		=> 15,
			'row_label'   	=> array(
				'value' => esc_html__( 'Item', 'foodie-diary' ),
			),
			'button_label' => esc_attr__( 'Add new item', 'foodie-diary' ),
			'settings'    => 'foodie_diary_featured_items',
			'default'     => array(
				array(
					'item_image' 	 => '',
					'item_title'	 => '',
					'item_link' 	 => '',
				)
			),
			'fields'      => array(
				'item_image' 	=> array(
					'type'		=> 'image',
					'label'   	=> esc_html__( 'Item Image', 'foodie-diary' )
				),
				'item_title' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Item Title', 'foodie-diary' )
				),
				'item_link'	=> array(
					'type'			=> 'link',
					'label'   		=> esc_html__( 'Item Link', 'foodie-diary' )
				),
			),
			'choices' => array(
			    'limit' => 3
			)
		)
	);

	// Color Picker field for Primary Color
	Kirki::add_field(
		'wp_diary_config', array(
			'type'        => 'color',
			'settings'    => 'wp_diary_primary_color',
			'label'       => __( 'Primary Color', 'foodie-diary' ),
			'section'     => 'colors',
			'default'     => '#ef5350',
		)
	);

	// Text filed for copyright
	Kirki::add_field(
		'wp_diary_config', array(
			'type'     => 'text',
			'settings' => 'wp_diary_footer_copyright',
			'label'    => esc_html__( 'Copyright Text', 'foodie-diary' ),
			'section'  => 'wp_diary_section_bottom_footer',
			'default'  => '',
			'priority' => 10,
		)
	);

	// Toggle field for Enable/Disable social icons.
	Kirki::add_field(
		'wp_diary_config', array(
			'type'     => 'toggle',
			'settings' => 'foodie_diary_enable_social_icons',
			'label'    => esc_html__( 'Enable Social Icons', 'foodie-diary' ),
			'section'  => 'wp_diary_section_header_extra',
			'default'  => '0',
			'priority' => 10,
		)
	);

}