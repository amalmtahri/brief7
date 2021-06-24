<?php
/**
 * blog Section options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

// Add blog section
$wp_customize->add_section( 'house_state_blog_section', array(
	'title'             => esc_html__( 'Blog','house-state' ),
	'description'       => esc_html__( 'Blog Section options.', 'house-state' ),
	'panel'             => 'house_state_front_page_panel',
) );



// blog content enable control and setting
$wp_customize->add_setting( 'house_state_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'house_state_sanitize_switch_control',
) );

$wp_customize->add_control( new House_State_Switch_Control( $wp_customize, 'house_state_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'blog Section Enable', 'house-state' ),
	'section'           => 'house_state_blog_section',
	'on_off_label' 		=> house_state_switch_options(),
) ) );

$wp_customize->add_setting( 'house_state_theme_options[blog_section_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_section_title'],
	'transport'			=>'refresh'
) );

$wp_customize->add_control('house_state_theme_options[blog_section_title]', array(
	'label'             =>  esc_html__( 'Section Title', 'house-state' ),
	'section'           => 'house_state_blog_section',
	'type'              => 'text',
	'active_callback'	=> 'house_state_is_blog_section_enable',
));

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[blog_section_title]', array(
		'selector'            => '#latest-posts .section-header .section-title',
		'settings'            => 'house_state_theme_options[blog_section_title]',
		'fallback_refresh'    => true,
		'container_inclusive' => false,
 		'render_callback'     => 'house_state_service_title_txt_partial',
    ) );
}


// blog number control and setting
$wp_customize->add_setting( 'house_state_theme_options[blog_count]', array(
	'default'          	=> $options['blog_count'],
	'sanitize_callback' => 'house_state_sanitize_number_range',
) );

$wp_customize->add_control( 'house_state_theme_options[blog_count]', array(
	'label'             => esc_html__( 'Number of Featured', 'house-state' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 5. Please input the valid number and save. Then refresh the page to see the change.', 'house-state' ),
	'section'           => 'house_state_blog_section',
	'active_callback'   => 'house_state_is_blog_section_enable',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 6,
		'style' => 'width: 100px;'
		),
) );

// blog content type control and setting
$wp_customize->add_setting( 'house_state_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'house_state_sanitize_select',
) );

$wp_customize->add_control( 'house_state_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'house-state' ),
	'section'           => 'house_state_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'house_state_is_blog_section_enable',
	'choices'			=> array( 
            'page' 		=> esc_html__( 'Page', 'house-state' ),
            'post' 		=> esc_html__( 'Post', 'house-state' ),
    ),
) );


for ( $i = 1; $i <= $options['blog_count']; $i++ ) :

	// blog pages drop down chooser control and setting
	$wp_customize->add_setting( 'house_state_theme_options[blog_content_page_'. $i .']', array(
		'sanitize_callback' => 'house_state_sanitize_page',
	) );

	$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[blog_content_page_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Page: %d', 'house-state'), $i ),
		'section'           => 'house_state_blog_section',
		'choices'			=> house_state_page_choices(),
		'active_callback'	=> 'house_state_is_blog_section_content_page_enable',
	) ) );

	// blog posts drop down chooser control and setting
	$wp_customize->add_setting( 'house_state_theme_options[blog_content_post_'. $i .']', array(
		'sanitize_callback' => 'house_state_sanitize_page',
	) );

	$wp_customize->add_control( new House_State_Dropdown_Chooser( $wp_customize, 'house_state_theme_options[blog_content_post_'. $i .']', array(
		'label'             => sprintf(esc_html__( 'Select Post : %d', 'house-state'), $i ),
		'section'           => 'house_state_blog_section',
		'choices'			=> house_state_post_choices(),
		'active_callback'	=> 'house_state_is_blog_section_content_post_enable',
	) ) );

endfor;

//blog_btn_txt
$wp_customize->add_setting('house_state_theme_options[blog_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['blog_btn_txt'],
    )
);

$wp_customize->add_control('house_state_theme_options[blog_btn_txt]',
    array(
        'section'			=> 'house_state_blog_section',
        'label'				=> esc_html__( 'Button Text:', 'house-state' ),
        'type'          	=>'text',
        'active_callback' 	=> 'house_state_is_blog_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'house_state_theme_options[blog_btn_txt]', array(
		'selector'            => '#latest-posts div.view-all a',
		'settings'            => 'house_state_theme_options[blog_btn_txt]',
		'fallback_refresh'    => true,
		'container_inclusive' => false,
 		'render_callback'     => 'house_state_blog_btn_txt_partial',
    ) );
}

//blog_btn_txt
$wp_customize->add_setting('house_state_theme_options[blog_btn_url]',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('house_state_theme_options[blog_btn_url]',
    array(
        'section'			=> 'house_state_blog_section',
        'label'				=> esc_html__( 'Button Url:', 'house-state' ),
        'type'          	=>'url',
        'active_callback' 	=> 'house_state_is_blog_section_enable'
    )
);



