<?php
/**
 * The template for displaying front page
 *
 * @package Astral
 * @since 0.1
 */
get_header();
if ( get_option( 'show_on_front' ) == 'page' ) {
	$astral_frontpage_show = get_theme_mod( 'astral_frontpage_show' );
	if ( $astral_frontpage_show ) {
		get_template_part( 'content', 'frontpage' );
	} else {
		if(is_page_template( 'fullwidth.php' )) {
			get_template_part( 'fullwidth' );
		} else {
			if(is_page_template( 'leftsidebar.php' )) {
				get_template_part( 'leftsidebar' );
			}
			else {
				get_template_part( 'index' );
			}
		}
	}
} else {
	get_template_part( 'index' );
}
get_footer();