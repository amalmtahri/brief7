<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

/**
 * house_state_footer_primary_content hook
 *
 * @hooked house_state_add_subscribe_section -  10
 *
 */
do_action( 'house_state_footer_primary_content' );

/**
 * house_state_content_end_action hook
 *
 * @hooked house_state_content_end -  10
 *
 */
do_action( 'house_state_content_end_action' );

/**
 * house_state_content_end_action hook
 *
 * @hooked house_state_footer_start -  10
 * @hooked house_state_Footer_Widgets->add_footer_widgets -  20
 * @hooked house_state_footer_site_info -  40
 * @hooked house_state_footer_end -  100
 *
 */
do_action( 'house_state_footer' );

/**
 * house_state_page_end_action hook
 *
 * @hooked house_state_page_end -  10
 *
 */
do_action( 'house_state_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
