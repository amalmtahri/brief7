<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage House State
	 * @since House State 1.0.0
	 */

	/**
	 * house_state_doctype hook
	 *
	 * @hooked house_state_doctype -  10
	 *
	 */
	do_action( 'house_state_doctype' );

?>
<head>
<?php
	/**
	 * house_state_before_wp_head hook
	 *
	 * @hooked house_state_head -  10
	 *
	 */
	do_action( 'house_state_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * house_state_page_start_action hook
	 *
	 * @hooked house_state_page_start -  10
	 *
	 */
	do_action( 'house_state_page_start_action' ); 

	/**
	 * house_state_loader_action hook
	 *
	 * @hooked house_state_loader -  10
	 *
	 */
	do_action( 'house_state_before_header' );

	/**
	 * house_state_header_action hook
	 *
	 * @hooked house_state_site_branding -  10
	 * @hooked house_state_header_start -  20
	 * @hooked house_state_site_navigation -  30
	 * @hooked house_state_header_end -  50
	 *
	 */
	do_action( 'house_state_header_action' );

	/**
	 * house_state_content_start_action hook
	 *
	 * @hooked house_state_content_start -  10
	 *
	 */
	do_action( 'house_state_content_start_action' );

    /**
     * house_state_header_image_action hook
     *
     * @hooked house_state_header_image -  10
     *
     */
    do_action( 'house_state_header_image_action' );
