<?php

get_header(); ?>
	<?php
		// Call home if Homepage setting is set to latest posts.
		if ( house_state_is_latest_posts() ) {

			get_template_part( 'template-parts/content', 'home' );

		} elseif ( house_state_is_frontpage() ) {
			
			$options = house_state_get_theme_options();

			$sorted = array( 'slider', 'about', 'project', 'team', 'service', 'blog', 'partner' );
		


			foreach ( $sorted as $section ) {
				add_action( 'house_state_primary_content', 'house_state_add_'. $section .'_section' );
			}
			do_action( 'house_state_primary_content' );
			
			if ( true === apply_filters( 'house_state_filter_frontpage_content_enable', true ) ) : ?>
			<div id="inner-content-wrapper" class="wrapper page-section no-padding-bottom">
			    <div id="primary" class="content-area">
			        <main id="main" class="site-main" role="main">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
				if ( house_state_is_sidebar_enable() ) {
					get_sidebar();
				} ?>
			</div><!-- .page-section -->
			<?php endif;
		}
get_footer();