<?php
/**
 * The template for displaying the footer
 *
 * @package Astral
 * @since 0.1
 */
?>
<?php $footer_widget = get_theme_mod( 'astral_footer_toggle','1' );
if($footer_widget) {
?>
<footer class="footer py-md-5 pt-md-3 pb-sm-5">
	<?php
	/* 
	* Functions hooked into astral_footer_widget_area action
	*
	* @hooked astral_footer_widget
	*/
	do_action( 'astral_footer_widget_area' );
	?>
</footer>
<?php } ?>
<div class="cpy-right text-center mwa-theme">
	<?php
	/* 
	* Functions hooked into astral_copyright_area action
	*
	* @hooked astral_copyright
	*/
	do_action( 'astral_copyright_area' );
	?>
</div>
<!-- scroll top icon -->
<?php if(get_theme_mod( 'astral_scrollup_toggle','1' )) : ?>
<a href="#" id="scroll" class="move-top text-center scrollup" style="">
    <div class="circle"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
</a>
<?php endif; ?>
<?php get_template_part('google', 'font'); ?>
<?php get_template_part('custom','css') ?> 
<?php wp_footer(); ?>
</body>
</html>