<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astral
 * @version 0.1
 */
?>
<div class="event-right1">
    <div id="sidebar-primary" class="sidebar">
		<?php if ( is_active_sidebar( 'sidebar-primary' ) ) :
			dynamic_sidebar( 'sidebar-primary' );
		else :
			$args = array(
				'before_widget' => '<div id="%1$s" class="mwa_widget mb-4 p-sm-4 p-3 border">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="courses-title">',
				'after_title'   => '</h3>'
			);
			the_widget( 'WP_Widget_Pages', null, $args );
			the_widget( 'WP_Widget_Categories', 'dropdown=1&count=1' );
		endif;
		?>
    </div>
</div>