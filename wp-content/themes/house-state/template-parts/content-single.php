<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
$options = house_state_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<?php the_post_thumbnail( 'full' ); ?>
    <div class="entry-meta">
       
    </div>
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'house-state' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'house-state' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	<div class="entry-meta">
		 <?php if(! $options['single_post_hide_author']):
            echo $options['single_post_hide_author'];
            echo house_state_author();
        endif; ?>
        <?php if (! $options['single_post_hide_date'] ) :
        	house_state_posted_on();
        endif; ?>
		<?php
			house_state_single_categories();
			house_state_entry_footer();
		?>
	</div>
</article><!-- #post-## -->
