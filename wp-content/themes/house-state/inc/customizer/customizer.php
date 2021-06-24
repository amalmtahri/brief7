<?php
/**
 * House State Customizer.
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

function house_state_customize_register( $wp_customize ) {
	$options = house_state_get_theme_options();

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/custom-controls.php';

	// Load customize active callback functions.
	require get_template_directory() . '/inc/customizer/active-callback.php';

	// Load partial callback functions.
	require get_template_directory() . '/inc/customizer/partial.php';

	// Load validation callback functions.
	require get_template_directory() . '/inc/customizer/validation.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	// Remove the core header textcolor control, as it shares the main text color.
	$wp_customize->remove_control( 'header_textcolor' );

	// Header title color setting and control.
	$wp_customize->add_setting( 'house_state_theme_options[header_title_color]', array(
		'default'           => $options['header_title_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'house_state_theme_options[header_title_color]', array(
		'priority'			=> 5,
		'label'             => esc_html__( 'Header Title Color', 'house-state' ),
		'section'           => 'colors',
	) ) );

	// Header tagline color setting and control.
	$wp_customize->add_setting( 'house_state_theme_options[header_tagline_color]', array(
		'default'           => $options['header_tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'house_state_theme_options[header_tagline_color]', array(
		'priority'			=> 6,
		'label'             => esc_html__( 'Header Tagline Color', 'house-state' ),
		'section'           => 'colors',
	) ) );

	// Site identity extra options.
	$wp_customize->add_setting( 'house_state_theme_options[header_txt_logo_extra]', array(
		'default'           => $options['header_txt_logo_extra'],
		'sanitize_callback' => 'house_state_sanitize_select',
		'transport'			=> 'refresh'
	) );

	$wp_customize->add_control( 'house_state_theme_options[header_txt_logo_extra]', array(
		'priority'			=> 50,
		'type'				=> 'radio',
		'label'             => esc_html__( 'Site Identity Extra Options', 'house-state' ),
		'section'           => 'title_tagline',
		'choices'				=> array( 
			'hide-all'     => esc_html__( 'Hide All', 'house-state' ),
			'show-all'     => esc_html__( 'Show All', 'house-state' ),
			'title-only'   => esc_html__( 'Title Only', 'house-state' ),
			'tagline-only' => esc_html__( 'Tagline Only', 'house-state' ),
			'logo-title'   => esc_html__( 'Logo + Title', 'house-state' ),
			'logo-tagline' => esc_html__( 'Logo + Tagline', 'house-state' ),
			)
	) );

	$wp_customize->add_setting( 'house_state_theme_options[enable_frontpage_content]', array(
		'sanitize_callback'   => 'house_state_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
		) );

	$wp_customize->add_control( 'house_state_theme_options[enable_frontpage_content]', array(
		'label'       	=> esc_html__( 'Enable Content', 'house-state' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'house-state' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		) );


	// Add panel for common theme options
	$wp_customize->add_panel( 'house_state_theme_options_panel' , array(
	    'title'      => esc_html__( 'Theme Options','house-state' ),
	    'description'=> esc_html__( 'House State Theme Options.', 'house-state' ),
	    'priority'   => 150,
	) );



	// breadcrumb
	require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

	// excerpt
	require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

	// load layout
	require get_template_directory() . '/inc/customizer/theme-options/layout.php';

	// load archive option
	require get_template_directory() . '/inc/customizer/theme-options/archive.php';
	
	// load single post option
	require get_template_directory() . '/inc/customizer/theme-options/single-posts.php';

	// load pagination option
	require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

	// load footer option
	require get_template_directory() . '/inc/customizer/theme-options/footer.php';

	// load reset option
	require get_template_directory() . '/inc/customizer/theme-options/reset.php';

	// Add panel for front page theme options.
	$wp_customize->add_panel( 'house_state_front_page_panel' , array(
	    'title'      => esc_html__( 'Front Page','house-state' ),
	    'description'=> esc_html__( 'Front Page Theme Options.', 'house-state' ),
	    'priority'   => 140,
	) );



	// load slider option
	require get_template_directory() . '/inc/customizer/sections/slider.php';

	// load about option
	require get_template_directory() . '/inc/customizer/sections/about.php';

	// load project option
	require get_template_directory() . '/inc/customizer/sections/project.php';

	// load team option
	require get_template_directory() . '/inc/customizer/sections/team.php';

	// load service option
	require get_template_directory() . '/inc/customizer/sections/service.php';	

	// load blog option
	require get_template_directory() . '/inc/customizer/sections/blog.php';	

	// load Partner option
	require get_template_directory() . '/inc/customizer/sections/partner.php';

	
}
add_action( 'customize_register', 'house_state_customize_register' );

/*
 * Load customizer sanitization functions.
 */
require get_template_directory() . '/inc/customizer/sanitize.php';



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function house_state_customize_preview_js() {
	wp_enqueue_script( 'house-state-customizer', get_template_directory_uri() . '/assets/js/customizer' . house_state_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'house_state_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function house_state_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'chosen-css', get_template_directory_uri() . '/assets/css/chosen' . house_state_min() . '.css' );

	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen.jquery' . house_state_min() . '.js', array( 'jquery' ), '1.4.2', true );

	// simple icon picker
	wp_enqueue_style( 'simple-iconpicker-css', get_template_directory_uri() . '/assets/css/simple-iconpicker' . house_state_min() . '.css' );

	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome' . house_state_min() . '.css' );



	wp_enqueue_script( 'jquery-simple-iconpicker', get_template_directory_uri() . '/assets/js/simple-iconpicker' . house_state_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_style( 'house-state-customize-controls-css', get_template_directory_uri() . '/assets/css/customize-controls' . house_state_min() . '.css' );



	wp_enqueue_script( 'house-state-customize-controls', get_template_directory_uri() . '/assets/js/customize-controls' . house_state_min() . '.js', array(), '1.0', true );



	$house_state_reset_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'house-state' )
	);
	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'house-state-customize-controls', 'house_state_reset_data', $house_state_reset_data );
}
add_action( 'customize_controls_enqueue_scripts', 'house_state_customize_control_js' );

if ( !function_exists( 'house_state_reset_options' ) ) :
	/**
	 * Reset all options
	 *
	 * @since House State 1.0.0
	 *
	 * @param bool $checked Whether the reset is checked.
	 * @return bool Whether the reset is checked.
	 */
	function house_state_reset_options() {
		$options = house_state_get_theme_options();
		if ( true === $options['reset_options'] ) {
			// Reset custom theme options.
			set_theme_mod( 'house_state_theme_options', array() );
			// Reset custom header and backgrounds.
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
			remove_theme_mod( 'header_textcolor' );
	    }
	  	else {
		    return false;
	  	}
	}
endif;
add_action( 'customize_save_after', 'house_state_reset_options' );
