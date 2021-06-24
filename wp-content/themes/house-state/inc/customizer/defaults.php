<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 * @return array An array of default values
 */

function house_state_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$house_state_default_options = array(
		// Color Options
		'header_title_color'			    => '#fff',
		'header_tagline_color'			    => '#fff',
		'header_txt_logo_extra'			    => 'show-all',
		'home_layout'						=> 'default-design',
		'enable_frontpage_content' 		=> false,

	
		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
		
		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'house-state' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'house-state' ),
		'hide_date' 					    => (bool) false,
		'hide_category'					    => (bool) false,


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,

		/* Front Page */

		// Slider
		'slider_section_enable'				=> (bool) false,
		'slider_content_type'				=> 'page',
		'slider_section_sub_title'			=> esc_html__('mesmerizing View','house-state'),
		'slider_count'						=> 4,
		'slider_autoplay_enable'			=> (bool) false,
		'slider_btn_txt'                    => esc_html__('START TOUR','house-state'),
		'slider_btn_alt_txt'                => esc_html__('Explore more','house-state'),
		'slider_excerpt'					=> 10,
		'style_sub_title_color'				=> '',
		'style_slider_overlay_enable'		=> true,

		// about
		'about_section_enable'				=> (bool) false,
		'about_content_type'				=> 'post',
		'about_btn_txt'                    	=> esc_html__('Exlore More','house-state'),
		'about_excerpt'						=> 10,
		'style_about_overlay_value'			=> 3,

		// project
		'project_section_enable'			=> (bool) false,
		'project_content_type'				=> 'post',
		'project_section_title'				=> esc_html__('Project','house-state'),
		'project_count'						=> 4,
		'project_autoplay_enable'			=> (bool) false,

		// team
		'team_section_enable'				=> (bool) false,
		'team_content_type'					=> 'post',
		'team_section_title'				=> esc_html__('Our Engineering Team','house-state'),
		'team_count'						=> 4,
		'team_autoplay_enable'				=> (bool) false,

		// service
		'service_section_enable'			=> (bool) false,
		'service_content_type'				=> 'post',
		'service_section_title'				=> esc_html__('Our Engineering Service','house-state'),
		'service_count'						=> 3,

		// blog
		'blog_section_enable'				=> (bool) false,
		'blog_content_type'					=> 'post',
		'blog_section_title'				=> esc_html__('Our Blog','house-state'),
		'blog_count'						=> 3,
		'blog_btn_txt'                    	=> esc_html__('START TOUR','house-state'),

		// partner
		'partner_section_enable'			=> (bool) false,
		'partner_content_type'				=> 'post',
		'partner_count'						=> 6,

		

	);

	$output = apply_filters( 'house_state_default_theme_options', $house_state_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}