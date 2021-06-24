<?php
/**
 * Banner section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
if ( ! function_exists( 'house_state_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since House State 1.0.0
    */
    function house_state_add_about_section() {
    	$options = house_state_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'house_state_section_status', true, 'about_section_enable' );


        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'house_state_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        house_state_render_about_section( $section_details );
}

endif;

if ( ! function_exists( 'house_state_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since House State 1.0.0
    * @param array $input about section details.
    */
    function house_state_get_about_section_details( $input ) {
        $options = house_state_get_theme_options();

        // Content type.
        $about_content_type    = get_theme_mod( 'house_state_theme_options_about_content_type', 'page' );

        $content = array();
        switch ( $about_content_type ) {
            
            case 'page':
                $page_id = !empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
                $args = array(
                    'post_type'         => 'page',
                    'page_id'                 => absint( $page_id ),
                    'posts_per_page'    => 1,
                    );                    
            break;

            case 'post':
                $page_id = !empty( $options['about_content_post'] ) ? $options['about_content_post'] : '';
                $args = array(
                    'post_type'             => 'post',
                    'p'                     => absint( $page_id ),
                    'ignore_sticky_posts'   => true,
                    'posts_per_page'    => 1,
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
                $page_post['excerpt']   = house_state_trim_content( $options['about_excerpt'] );
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
// about section content details.
add_filter( 'house_state_filter_about_section_details', 'house_state_get_about_section_details' );


if ( ! function_exists( 'house_state_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since House State 1.0.0
   *
   */
   function house_state_render_about_section( $content_details = array() ) {
        $options = house_state_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <?php foreach ($content_details as $content): ?>
            <?php if ( $options['home_layout'] == 'default-design' ): ?>
                <div id="about-us-fullwidth" class="relative page-section">
                      <div class="wrapper">
                        <article>
                            <div class="section-header">
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
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

                            <div class="section-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .section-content -->

                            <?php if ( !empty($options['about_btn_txt']) ): ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn" title="<?php echo esc_attr( $content['title'] ) ?>"><?php echo esc_html( $options['about_btn_txt'] ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif ?>                        
                        </article>
                    </div><!-- .wrapper -->
                </div><!-- #about-us-fullwidth -->
                <?php else: ?>
                <div id="about-us" class="relative page-section">
                  <?php if ( $options['style_about_overlay_enable'] == true ): ?>
                      <div class="overlay"></div>
                  <?php endif ?>
                    <div class="wrapper">
                        <article class="has-post-thumbnail">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ) ?>" title="<?php echo esc_attr( $content['title'] ) ?>"><img src="<?php echo esc_url( $content['image'] ) ?>"></a>
                            </div><!-- .featured-image -->

                            <div class="section-container">
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $content['title'] ) ?></h2>
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

                                <div class="section-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .section-content -->

                                <?php if ( !empty($options['about_btn_txt']) ): ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn" title="<?php echo esc_attr( $content['title'] ) ?>"><?php echo esc_html( $options['about_btn_txt'] ); ?></a>
                                    </div><!-- .read-more -->
                                <?php endif ?>  
                              </div>
                        </article>
                    </div><!-- .wrapper -->
                </div><!-- #about-us -->   
            <?php endif ?>
           
        <?php endforeach ?>
       
    <?php
    }    
endif;