<?php
/**
 * Banner section
 *
 * This is the template for the content of partner section
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */
if ( ! function_exists( 'house_state_add_partner_section' ) ) :
    /**
    * Add partner section
    *
    *@since House State 1.0.0
    */
    function house_state_add_partner_section() {
        $options = house_state_get_theme_options();
        // Check if partner is enabled on frontpage
        $partner_enable = apply_filters( 'house_state_section_status', true, 'partner_section_enable' );

        if ( true !== $partner_enable ) {
            return false;
        }
        // Get partner section details
        $section_details = array();
        $section_details = apply_filters( 'house_state_filter_partner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render partner section now.
        house_state_render_partner_section( $section_details );
}

endif;

if ( ! function_exists( 'house_state_get_partner_section_details' ) ) :
    /**
    * partner section details.
    *
    * @since House State 1.0.0
    * @param array $input partner section details.
    */
    function house_state_get_partner_section_details( $input ) {
        $options = house_state_get_theme_options();
        
        $content = array();

        $page_ids = array();

        for ( $i = 1; $i <= 6; $i++ ) {
            if ( ! empty( $options['partner_content_page_' . $i] ) )
                $page_ids[] = $options['partner_content_page_' . $i];
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 6 ),
            'orderby'           => 'post__in',
            );                    
          
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id() ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// partner section content details.
add_filter( 'house_state_filter_partner_section_details', 'house_state_get_partner_section_details' );


if ( ! function_exists( 'house_state_render_partner_section' ) ) :
  /**
   * Start partner section
   *
   * @return string partner content
   * @since House State 1.0.0
   *
   */
   function house_state_render_partner_section( $content_details = array() ) {
        $options = house_state_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="partners-section" class="relative page-section">
            <div class="wrapper">
                <div class="section-content col-6 clear">
                    <?php foreach ($content_details as $content): ?>                   
                        <article><a href="<?php echo esc_url( $content['url'] ) ?>" title="<?php echo esc_attr( $content['title'] ) ?>"><img src="<?php echo esc_url( $content['image'] ) ?>" alt="<?php echo esc_attr( $content['title'] ) ?>"></a></article>
                    <?php endforeach ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #partners-section -->       
    <?php
    }    
endif;
