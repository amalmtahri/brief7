<?php
/**
 * Display the slider posts in perticular section
 *
 * @package Mystery Theems
 * @subpackage WP Diary
 * @since 1.0.0
 *
 */

$wp_diary_slider_cat = get_theme_mod( 'wp_diary_slider_cat', '' );

if( empty( $wp_diary_slider_cat ) ) {
	return false;
}

$wp_diary_slider_count = apply_filters( 'wp_diary_slider_count', 10 );

$slider_args = array(
		'category_name' => esc_attr( $wp_diary_slider_cat ),
		'posts_per_page' => absint( $wp_diary_slider_count )
	);

$slider_query = new WP_Query( $slider_args );

if( $slider_query->have_posts() ) {

?>

	<div class="mt-slider">
		<?php
			while( $slider_query->have_posts() ) {
				$slider_query->the_post();
				get_template_part( 'template-parts/slider/content', 'slider' );
			}
		?>
	</div><!-- .mt-slider -->

<?php
}
?>