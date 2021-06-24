<?php
/**
 * The template for displaying woocommerce page
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
?>
<nav aria-label="breadcrumb">
	<?php if ( have_posts() ) { ?>
    <ol class="breadcrumb d-flex justify-content-center">
        <li class="breadcrumb-item">
            <?php woocommerce_breadcrumb(); ?>
        </li>
	</ol>
	<?php } ?>
</nav>
<section class="align-blog" id="blog">
    <div class="container">
        <div class="row">
            <!-- left side -->
            <div class="col-lg-8 single-left mt-lg-0 mt-4">
				<?php woocommerce_content(); ?>
            </div>
            <!-- right side -->
            <div class="col-lg-4 event-right">
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();