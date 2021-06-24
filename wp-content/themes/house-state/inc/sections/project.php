<?php
/**
 * Banner section
 *
 * This is the template for the content of project section
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
if ( ! function_exists( 'house_state_add_project_section' ) ) :
    /**
    * Add project section
    *
    *@since House State 1.0.0
    */
    function house_state_add_project_section() {
    	$options = house_state_get_theme_options();
        // Check if project is enabled on frontpage
        $project_enable = apply_filters( 'house_state_section_status', true, 'project_section_enable' );

        if ( true !== $project_enable ) {
            return false;
        }
        // Get project section details
        $section_details = array();
        $section_details = apply_filters( 'house_state_filter_project_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render project section now.
        house_state_render_project_section( $section_details );
}

endif;

if ( ! function_exists( 'house_state_get_project_section_details' ) ) :
    /**
    * project section details.
    *
    * @since House State 1.0.0
    * @param array $input project section details.
    */
    function house_state_get_project_section_details( $input ) {
        $options = house_state_get_theme_options();

        $content = array();
      
        $page_ids = array();

        for ( $i = 1; $i <= 6; $i++ ) {
            if ( ! empty( $options['project_content_page_' . $i] ) )
                $page_ids[] = $options['project_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 6,
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
// project section content details.
add_filter( 'house_state_filter_project_section_details', 'house_state_get_project_section_details' );


if ( ! function_exists( 'house_state_render_project_section' ) ) :
  /**
   * Start project section
   *
   * @return string project content
   * @since House State 1.0.0
   *
   */
   function house_state_render_project_section( $content_details = array() ) {
        $options = house_state_get_theme_options();
       
        if ( empty( $content_details ) ) {
            return;
        } ?>
       <div id="projects-section" class="relative page-section" >

            <div class="overlay"></div>
         
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( !empty( $options['project_section_title'] ) ): ?>
                        <h2 class="section-title"><?php echo esc_html( $options['project_section_title'] ) ; ?></h2>
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

                <div class="project-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="project-item">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link" title="<?php echo esc_attr( $content['title'] ) ?>"></a>
                                </div>
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header><!-- .entry-header -->

                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>" title="<?php echo esc_attr( $content['title'] ) ?>"><?php echo esc_html__( '+', 'house-state' ); ?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .entry-container -->
                            </div><!-- .project-item -->
                        </article>
                    <?php endforeach; ?>
                </div>
                </div><!-- .project-slider -->
            </div><!-- .wrapper -->
        </div><!-- #projects-section -->
       
    <?php
    }    
endif;


function house_state_project_style( ) {
    $options = house_state_get_theme_options();
?>

    <style type="text/css"> 

       
        <?php if ( !empty( $options['style_project_background'] ) ): ?>
           #projects-section{
                background-image: url('<?php echo esc_url( $options['style_project_background'] ); ?>');
           }
       <?php endif ?>

       <?php if ( !empty( $options['style_project_overlay_color'] ) ): ?>
           #projects-section .overlay{
                background-color: <?php echo esc_attr( $options['style_project_overlay_color'] ); ?>;
           }
       <?php endif ?>

       <?php if ( !empty( $options['style_project_background_color'] ) ): ?>
           #projects-section{
                background-color: <?php echo esc_attr( $options['style_project_background_color'] ); ?>;
           }
       <?php endif ?>

       <?php if ( !empty( $options['style_project_overlay_value'] ) ): ?>
           #projects-section .overlay{
                opacity: 0.<?php echo esc_attr( $options['style_project_overlay_value'] ); ?>;
           }
       <?php endif ?>


    </style>
        
<?php 
}

add_action( 'wp_head', 'house_state_project_style' );

