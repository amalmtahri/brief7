<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astral
 * @since 0.1
 */
get_header(); 
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' ); 
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb_area
*/
if( get_theme_mod( 'astral_breadcrumb_toggle','1' ) ) :
do_action( 'astral_breadcrumb_area' ); 
endif;
?>
<div class="container notfound" id="404page">
	<div class="row">
	<div class="col-md-8 mwa-main">
		<div class="responsive_tabs mwa_tab">
		<h1 class="title-agile text-center"> <?php esc_html_e( 'Oops! The page you requested not found.', 'astral' ); ?></h1>
			<h2><?php esc_html_e( '404', 'astral' ); ?></h2>
			<p><?php esc_html_e( 'Page cannot be found', 'astral' ); ?></p>
			<?php get_search_form(); ?>
			<div class="hom">
				<a href="<?php echo esc_url( home_url("/") ); ?>"> <?php esc_html_e( 'Go Home', 'astral' ); ?></a>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<?php get_sidebar(); ?>
	</div>
	</div>
</div>
<?php 
get_footer();