<?php
/**
 * Banner section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
if ( ! function_exists( 'house_state_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since House State 1.0.0
    */
    function house_state_add_blog_section() {
    	$options = house_state_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'house_state_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'house_state_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        house_state_render_blog_section( $section_details );
}

endif;

if ( ! function_exists( 'house_state_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since House State 1.0.0
    * @param array $input blog section details.
    */
    function house_state_get_blog_section_details( $input ) {
        $options = house_state_get_theme_options();

        // Content type.
        $blog_content_type    = $options['blog_content_type'];
        $blog_count           = ! empty( $options['blog_count'] ) ? $options['blog_count'] : 4;
        
        $content = array();
        switch ( $blog_content_type ) {
            
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_page_' . $i] ) )
                        $page_ids[] = $options['blog_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( $blog_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $blog_count; $i++ ) {
                    if ( ! empty( $options['blog_content_post_' . $i] ) )
                        $post_ids[] = $options['blog_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( $blog_count ),
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['blog_category'] ) ? $options['blog_category'] : '';
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => absint( $blog_count ),
                    'cat'                   => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['author']    = house_state_author();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// blog section content details.
add_filter( 'house_state_filter_blog_section_details', 'house_state_get_blog_section_details' );


if ( ! function_exists( 'house_state_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since House State 1.0.0
   *
   */
   function house_state_render_blog_section( $content_details = array() ) {
        $options = house_state_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="latest-posts" class="relative page-section">             

            <div class="wrapper">
                <div class="section-header">
                    <?php if ( !empty( $options['blog_section_title'] ) ): ?>
                        <h2 class="section-title"><?php echo esc_html( $options['blog_section_title'] ) ; ?></h2>
                    <?php endif ?>
                    <span class="separator">
                        <svg>
                          <g>
                            <path stroke="#A38041" stroke-width="3" d="M0 0 l215 0" />
                            <path stroke="#A38041" stroke-width="2" d="M5,100 v-100" />
                            <path stroke="#A38041" stroke-width="2" d="M10,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M15,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M20 0 v600 400" />
                            <path stroke="#A38041" stroke-width="2" d="M25,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M30,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M35 0 v600 400" />
                            <path stroke="#A38041" stroke-width="2" d="M40,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M45,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M50 0 v600 400" />
                            <path stroke="#A38041" stroke-width="2" d="M55,8 v-50" />
                            <path stroke="#A38041" stroke-width="2" d="M60 0 v600 400" />
                          </g>
                        </svg>
                    </span><!-- .separator -->
                </div><!-- .section-header -->

                <div class="archive-blog-wrapper col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="post-item-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link" title="<?php echo esc_attr( $content['title'] ) ?>"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <?php house_state_posted_on( $content['id'] ); ?>
                                    </div><!-- .entry-meta -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>" title="<?php echo esc_attr( $content['title'] ) ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                                    </header>

                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" title="<?php echo esc_attr( $content['title'] ) ?>"><?php echo esc_html__( '+', 'house-state' ); ?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .entry-container -->
                            </div><!-- .post-item-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->

                <?php if ( !empty( $options['blog_btn_txt'] ) && !empty( $options['blog_btn_url'] ) ): ?>
                    <div class="view-all">
                        <a href="<?php echo esc_url(  $options['blog_btn_url'] ) ; ?>" class="btn" title="<?php echo esc_attr( $options['blog_btn_txt'] ) ?>">
                            <?php echo esc_html(  $options['blog_btn_txt'] ) ; ?>
                        </a>
                    </div><!-- .view-all -->
                <?php endif ?>
                
            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->
       
    <?php
    }    
endif;

