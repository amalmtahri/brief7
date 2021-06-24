<?php
$main_heading_font = get_theme_mod( 'main_heading_font' );
$menu_font = get_theme_mod( 'menu_font');
$theme_title   = get_theme_mod( 'theme_title');
$desc_font_all   = get_theme_mod( 'desc_font_all' );
?>

<style>
#logo a {
	font-family: <?php echo $main_heading_font; ?>
}
#logo p {
	font-family: <?php echo $main_heading_font; ?>
}
.navbar-light .navbar-nav .nav-link {
	font-family: <?php echo $menu_font; ?>
}
.slider-info h3, h4.abt-text, h4.mwa-title, .mwa_footer_widget h3.f_title, .align-blog h3.card-title, .card-title a, .leave-coment-form h3, .card-body h4 a, .abt-txt h4 a, h3.courses-title, .notfound h1, .notfound h2, h2.comments-title, h1.card-title, h2.card-title, h3.card-title, h4.card-title, h5.card-title, h6.card-title  {
	font-family: <?php echo $theme_title; ?>
}
.slider-info p, p.sub-title, .abt_bottom p, .align-blog p, .abt-txt p, .mwa_footer_widget a, .cpy-right p, .cpy-right a, .mwa_widget ul li a, li.breadcrumb-item a, .breadcrumb-item+.breadcrumb-item, .col-md-6.email p, .col-md-6.email a, .col-md-6.phone p, .navigation a, .category span, .category a, .metabox .entry-date, .metabox a, .metabox .entry-comments, .notfound p, table#wp-calendar, .hom a, .searchform input[type="submit"], .searchform input[type="text"], #callout .mwa_link_bnr, a.blog_link, .astral_blog a.single, #mwa_banner_slider .mwa_link_bnr {
	font-family: <?php echo $desc_font_all; ?>
}
</style>