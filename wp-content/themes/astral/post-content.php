<div id="post-<?php the_ID(); ?>" <?php post_class( 'astral_blog' ); ?>>
<?php $astral_post_title_size = get_theme_mod('astral_post_title_size','3'); ?>
    <h<?php echo esc_html($astral_post_title_size); ?> class="card-title">
		<?php if ( is_single() || is_page() ) {
			the_title();
		} else { ?>
            <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
		<?php } ?>
    </h<?php echo esc_html($astral_post_title_size); ?>>
    <hr>

	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'astral-blog-thumb' );  /* post thumbnail */
	}
	?>

	<?php
	if ( is_single() || is_home() || is_author() || is_category() || is_tag() || is_archive() ) { ?>
        <div class="metabox">
            <span class="entry-date"><i class="fa fa-calendar"></i><?php echo esc_html( get_the_date() ); ?></span>

            <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><i class="fa fa-user"></i> <?php the_author_meta( 'display_name' ); ?></a></span>

            <span class="entry-comments"><i class="fa fa-comments"></i>
			<?php comments_number( '0', '1 comment', '% comments' ); ?> </span>
        </div>
	<?php } 

	if ( is_single() && get_the_category_list() ) { ?>
        <div class="mt-4 category">
            <div class="category_list">
                <span> <?php esc_html_e( "Categories :", 'astral' ); ?> </span>
				<?php the_category( ' , ' ); ?>
            </div>
        </div>
	<?php }

	if ( is_single() && get_the_category_list() ) { ?>
        <div class="mt-4 category">
            <div class="tag_list">
				<?php the_tags( __( 'Tags : ', 'astral' ), '', '<br />' ); ?>
            </div>
        </div>
	<?php }

	if ( is_single() || is_page() ) {
		the_content();
	} else {
		the_excerpt();
	}

	if ( ! is_page() && ! is_single() ) { ?>
        <a class="single" target="_blank" href="<?php the_permalink(); ?>"> <?php esc_html_e( 'Read More', 'astral' ); ?> </a>
	<?php }

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