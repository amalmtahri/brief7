<?php /*
* theme extra functions 
*/
/* inner banner */
function astral_inner_banner() { ?>
    <div class="inner-banner d-flex flex-column justify-content-center align-items-center"
         style="background:url( <?php if ( get_theme_mod( 'inner_header_image' ) ) {
		     echo esc_url( get_theme_mod( 'inner_header_image' ) );
	     } else {
		     echo esc_url( get_template_directory_uri() ) . "/images/inner.jpg";
	     } ?>);"></div>
<?php }
add_action( 'astral_top_banner', 'astral_inner_banner' );

/* display comments */
if ( ! function_exists( 'astral_comment' ) ) :
	function astral_comment( $comment, $args, $depth ) {
		//get theme data
		global $comment_data;
		//translations
		$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] :
			__( 'Reply', 'astral' ); ?>
        <div class="comments">
            <div class="comments-grids">
                <div class="media">
					<?php echo get_avatar( $comment, $size = '60' ); ?>
                    <div class="media-body comments-grid-right">
                        <h4><?php comment_author(); ?></h4>

                        <ul class="my-2">
                            <li class="font-weight-bold"><?php comment_date(); ?>
								<?php esc_html_e( 'at', 'astral' ); ?>&nbsp;<?php comment_time( 'g:i a' ); ?></li>
                        </ul>

						<?php comment_text(); ?>

                        <div class="reply">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => $leave_reply,
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
							) ) ) ?>
                        </div>

						<?php if ( $comment->comment_approved == '0' ) : ?>
                            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'astral' ); ?></em>
                            <br/>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
	<?php }
endif;

/* breadcrumb */
if ( ! function_exists( 'astral_breadcrumb' ) ) :
	function astral_breadcrumb() { ?>
        <nav aria-label="breadcrumb">
			<?php if ( have_posts() ) { ?>
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'astral' ); ?></a>
                    </li>

					<?php if ( is_page() || is_single() ) { ?>
                        <li class="breadcrumb-item " aria-current="page"><?php the_title(); ?></li> <?php } ?>

					<?php if ( is_category() || is_tag() ) { ?>
                        <li class="breadcrumb-item " aria-current="page"><?php echo single_cat_title(); ?></li>
					<?php } ?>

					<?php if ( is_archive() && ! is_tag() && ! is_author() ) { ?>
                        <li class="breadcrumb-item " aria-current="page">
							<?php if ( is_day() ) :
								/* translators: %s: date. */
								printf( esc_html__( 'Daily Archives: %s', 'astral' ), '<span>' . get_the_date() . '</span>' );
                            elseif ( is_month() ) :
								/* translators: %s: month. */
								printf( esc_html__( 'Monthly Archives: %s', 'astral' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'astral' ) ) . '</span>' );
                            elseif ( is_year() ) :
								/* translators: %s: year. */
								printf( esc_html__( 'Yearly Archives: %s', 'astral' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'astral' ) ) . '</span>' );
							else :
								//esc_html_e( 'Archives', 'astral' );
							endif; ?>
                        </li>
					<?php } ?>

					<?php if ( is_search() ) {
						/* translators: %s: search term. */ ?>
                        <li class="breadcrumb-item "
                            aria-current="page"><?php printf( esc_html__( 'Search Results for: %s', 'astral' ), '<span>' . get_search_query() . '</span>' ); ?></li>
					<?php } ?>

					<?php if ( is_author() ) { ?>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_author(); ?></li>
					<?php } ?>

                </ol>
			<?php } elseif ( is_404() ) { ?>

                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'astral' ); ?></a>
                    </li>

                    <li class="breadcrumb-item"><?php esc_html_e( '404 Error', 'astral' ); ?></li>
                </ol>
			<?php } ?>
        </nav>
		<?php
	}
endif;
add_action( 'astral_breadcrumb_area', 'astral_breadcrumb' );

/* single post navigation */
function astral_post_navigation() { ?>
    <div class="navigation">
        <div class="single_left alignleft">
			<?php previous_post_link(); ?>
        </div>
        <div class="single_right alignright">
			<?php next_post_link(); ?>
        </div>
    </div>
	<?php
}
add_action( 'astral_single_blog_navigation', 'astral_post_navigation' );

/* pagination link for index, author, category, tag pages */
function astral_navigation() { ?>
    <div class="navigation">
		<?php posts_nav_link(); ?>
    </div>
	<?php
}
add_action( 'astral_pagination', 'astral_navigation' );

/* excerpt length */
remove_filter( 'the_excerpt', 'wp_trim_excerpt' );
function new_trim_excerpt($text) {
 global $post;
 if ( '' == $text ) {
 $text = get_the_content('');
 $text = apply_filters('the_content', $text);
 $text = str_replace('\]\]\>', ']]>', $text);
 $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
 $text = strip_tags($text, '<a>');
 $excerpt_length = 30;
 $words = explode(' ', $text, $excerpt_length + 1);
 if (count($words)> $excerpt_length) {
 array_pop($words);
 array_push($words, '...');
 $text = implode(' ', $words);
 }
 }
 return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'new_trim_excerpt');

/* wp_body_open function check */
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function astral_enqueue_custom_admin_style() {
        wp_register_style( 'astral_custom_admin_css', get_template_directory_uri() . '/css/admin-themes.css' );
        wp_enqueue_style( 'astral_custom_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'astral_enqueue_custom_admin_style' );