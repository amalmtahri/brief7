<div id="post-<?php the_ID(); ?>" <?php post_class( 'astral_full_width_page' ); ?>>
    <h3 class="card-title">
		<?php the_title(); ?>
    </h3>
    <hr>
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'blog-thumb' );  /* post thumbnail */
	}
	the_content( __( 'Read More', 'astral' ) );
	$astral_pagination = array(
		'before'           => '<p>' . __( 'Pages:', 'astral' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page', 'astral' ),
		'previouspagelink' => __( 'Previous page', 'astral' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
	wp_link_pages( $astral_pagination ); ?>
</div>