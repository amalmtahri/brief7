<?php
/**
 * Astral hooks.
 *
 * @package Astral
 */

/* ------------------------------ HEADER ------------------------------ */
/**
 * Header doctype.
 *
 * @see astral_doctype()
 */
add_action( 'astral_action_doctype', 'astral_doctype', 10 );

/*
* head section 
*
* @see astral_head()
*/
add_action( 'astral_head_section', 'astral_head' );

/* 
* body start 
*
* @see astral_page_start()
*/
add_action( 'astral_body_start', 'astral_page_start' );

/* 
* menus start
* 
* @see astral_menus()
*/
add_action( 'astral_top_menus', 'astral_menus' );

/* --------------------------- FOOTER ------------------------------------*/

/* 
* footer widget
*
* @see astral_footer_widget() 
*/
add_action( 'astral_footer_widget_area', 'astral_footer_widget' );

/* 
* footer copyright
*
* @see astral_copyright() 
*/
add_action( 'astral_copyright_area', 'astral_copyright' );

/*---------------------------- FRONT PAGE ------------------------------*/
