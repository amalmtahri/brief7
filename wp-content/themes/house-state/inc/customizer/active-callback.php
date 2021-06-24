<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

if ( ! function_exists( 'house_state_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since House State 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function house_state_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'house_state_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'house_state_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since House State 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function house_state_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'house_state_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'house_state_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since House State 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function house_state_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'house_state_theme_options[pagination_enable]' )->value();
	}
endif;



/**
 * Check if slider section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if slider section content type is post.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_slider_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options_slider_content_type' )->value();
	return house_state_is_slider_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if slider section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_slider_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options_slider_content_type' )->value();
	return house_state_is_slider_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if slider section content type is category.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_slider_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options_slider_content_type' )->value();
	return house_state_is_slider_section_enable( $control ) && ( 'category' == $content_type );
}
/**
 * Check if slider separator section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_slider_section_separator_enable( $control ) {
    $content_type = $control->manager->get_setting( 'house_state_theme_options_slider_content_type' )->value();
    return house_state_is_slider_section_enable( $control ) && !( 'category' == $content_type );
}




/**
 * Check if about section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[about_section_enable]' )->value() );
}





/**
 * Check if project section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_project_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[project_section_enable]' )->value() );
}


function house_state_is_project_section_overlay_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[style_project_overlay_enable]' )->value() );
}

/**
 * Check if project section content type is post.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_project_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[project_content_type]' )->value();
	return house_state_is_project_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if project section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_project_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[project_content_type]' )->value();
	return house_state_is_project_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if project section content type is category.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_project_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[project_content_type]' )->value();
	return house_state_is_project_section_enable( $control ) && ( 'category' == $content_type );
}


/**
 * Check if team section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[team_section_enable]' )->value() );
}

/**
 * Check if team section content type is post.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_team_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[team_content_type]' )->value();
	return house_state_is_team_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if team section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_team_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[team_content_type]' )->value();
	return house_state_is_team_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if team section content type is category.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_team_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[team_content_type]' )->value();
	return house_state_is_team_section_enable( $control ) && ( 'category' == $content_type );
}


/**
 * Check if service section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if service section content type is post.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_service_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[service_content_type]' )->value();
	return house_state_is_service_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if service section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_service_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[service_content_type]' )->value();
	return house_state_is_service_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if service section content type is category.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_service_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[service_content_type]' )->value();
	return house_state_is_service_section_enable( $control ) && ( 'category' == $content_type );
}


/**
 * Check if blog section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is post.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_blog_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[blog_content_type]' )->value();
	return house_state_is_blog_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if blog section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_blog_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[blog_content_type]' )->value();
	return house_state_is_blog_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if blog section content type is category.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[blog_content_type]' )->value();
	return house_state_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}


/**
 * Check if partner section is enabled.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_partner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'house_state_theme_options[partner_section_enable]' )->value() );
}
/**
 * Check if partner section content type is page.
 *
 * @since House State 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function house_state_is_partner_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'house_state_theme_options[partner_content_type]' )->value();
	return house_state_is_partner_section_enable( $control ) && ( 'page' == $content_type );
}



