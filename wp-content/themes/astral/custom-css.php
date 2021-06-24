<?php
$header_color_setting = get_theme_mod( 'header_color_setting' );
$footer_color_setting = get_theme_mod( 'footer_color_setting' );
$button_color_setting = get_theme_mod( 'button_color_setting' );
$astral_section_title_size = get_theme_mod( 'astral_section_title_size' );
$astral_logo_width = get_theme_mod( 'astral_logo_width' );
$astral_logo_height = get_theme_mod( 'astral_logo_height' );
?>

<style>
header {
    background: <?php echo $header_color_setting; ?> !important;
}
.footer {
    background: <?php echo $footer_color_setting; ?> !important;
}
#mwa_banner_slider .mwa_link_bnr {
    background: <?php echo $button_color_setting; ?>;
    border: 2px solid <?php echo $button_color_setting; ?>;
}
#mwa_banner_slider .mwa_link_bnr:hover {
    background: transparent;
    border: 2px solid <?php echo $button_color_setting; ?>;
    color: <?php echo $button_color_setting; ?>;
}
#callout .mwa_link_bnr {
    background: <?php echo $button_color_setting; ?>;
    border: 1px solid <?php echo $button_color_setting; ?>;
}
#callout .mwa_link_bnr:hover {
    background: transparent;
    border: 1px solid <?php echo $button_color_setting; ?>;
    color: <?php echo $button_color_setting; ?>;
}
a.blog_link {
    border: 1px solid <?php echo $button_color_setting; ?>;
    background: <?php echo $button_color_setting; ?>;
}
.astral_blog a.single {
    border: 1px solid <?php echo $button_color_setting; ?>;
    background: <?php echo $button_color_setting; ?>;
}
.blog_page a.single:hover {
    border: 1px solid <?php echo $button_color_setting; ?>;
}
.searchform input[type="submit"] {
    background: <?php echo $button_color_setting; ?> !important;
}   
#mm_single_submit {
    background: <?php echo $button_color_setting; ?> !important;
}
.slider-info h3, h4.abt-text, h4.mwa-title {
    font-size: <?php echo $astral_section_title_size; ?>px !important;
}
#logo img {
    width: <?php echo $astral_logo_width; ?>px !important;
    height: <?php echo $astral_logo_height; ?>px !important;
}
</style>