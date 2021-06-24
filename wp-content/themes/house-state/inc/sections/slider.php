<?php
/**
 * Banner section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
if ( ! function_exists( 'house_state_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since House State 1.0.0
    */
    function house_state_add_slider_section() {
    	$options = house_state_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'house_state_section_status', true, 'slider_section_enable' );


        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'house_state_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        house_state_render_slider_section( $section_details );
}

endif;

if ( ! function_exists( 'house_state_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since House State 1.0.0
    * @param array $input slider section details.
    */
    function house_state_get_slider_section_details( $input ) {
        $options = house_state_get_theme_options();
        
        $content = array();

        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['author']    = house_state_author();
                $page_post['excerpt']   = house_state_trim_content( $options['slider_excerpt'] );
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
// slider section content details.
add_filter( 'house_state_filter_slider_section_details', 'house_state_get_slider_section_details' );


if ( ! function_exists( 'house_state_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since House State 1.0.0
   *
   */
   function house_state_render_slider_section( $content_details = array() ) {
        $options = house_state_get_theme_options();


        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="featured-slider-section" class="slider-section">
            <div class="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": false>, "draggable": true, "fade": true, "adaptiveHeight": true }'>
            <?php 
                $i = 1;
                foreach ( $content_details as $content ) : ?>
                    <article style="background-image: url('<?php echo esc_url( $content['image']); ?>');">   
                        <?php if ( $options['style_slider_overlay_enable'] == true ): ?>
                           <div class="overlay"></div>       
                        <?php endif ?>                                          
                        <div class="featured-content-wrapper">
                            <header class="entry-header">
                                <?php if ( !empty( $options['slider_section_sub_title_'.$i] ) ): ?>
                                    <h3 class="slider-subtitle"><?php echo esc_html( $options['slider_section_sub_title_'.$i] ); ?></h3>
                                <?php endif ?>
                                
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" title="<?php echo esc_attr( $content['title'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                            <div class="read-more">
                                <?php if(!empty($options['slider_btn_txt'])) echo sprintf( '<a href="%s" class="btn" title="'. $content['title'].'">%s</a>', esc_url($content['url']), esc_html($options['slider_btn_txt']) ); ?>
                            </div><!-- .read-more -->
                        </div>                        
                    </article>
                <?php $i++;
                endforeach; ?>
            </div><!-- #featured-slider -->
            <div class="scroll-to-bottom"><a href="#">
                <svg viewBox="0 0 792.033 792.033" class="icon icon-scroll-down">
                    <path d="M617.858,370.896L221.513,9.705c-13.006-12.94-34.099-12.94-47.105,0c-13.006,12.939-13.006,33.934,0,46.874
                    l372.447,339.438L174.441,735.454c-13.006,12.94-13.006,33.935,0,46.874s34.099,12.939,47.104,0l396.346-361.191
                    c6.932-6.898,9.904-16.043,9.441-25.087C627.763,386.972,624.792,377.828,617.858,370.896z"/>
                </svg>
                <span><?php echo esc_html__( 'Scroll', 'house-state' ); ?></span></a>
            </div><!-- .scroll-to-top -->
        </div>
    <?php
    }    
endif;
