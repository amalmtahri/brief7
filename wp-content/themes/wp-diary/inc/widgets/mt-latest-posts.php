<?php
/**
 * MT: Latest Posts
 *
 * Widget show the latest post with thumbnail.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

class WP_Diary_Latest_Posts extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'wp_diary_latest_posts',
            'description' => __( 'A widget to display the latest posts with thumbnail.', 'wp-diary' )
        );
        parent::__construct( 'wp_diary_latest_posts', __( 'MT: Latest Posts', 'wp-diary' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'widget_title' => array(
                'wp_diary_widgets_name'         => 'widget_title',
                'wp_diary_widgets_title'        => __( 'Widget title', 'wp-diary' ),
                'wp_diary_widgets_field_type'   => 'text'
            ),

            'widget_post_order' => array(
                'wp_diary_widgets_name'         => 'widget_post_order',
                'wp_diary_widgets_title'        => __( 'Post Order', 'wp-diary' ),
                'wp_diary_widgets_default'      => 'default',
                'wp_diary_widgets_field_type'   => 'select',
                'wp_diary_widgets_field_options' => array(
                        'default'   => __( 'Default Order', 'wp-diary' ),
                        'random'    => __( 'Random Order', 'wp-diary' ),
                    )    
            ),

            'widget_post_count' => array(
                'wp_diary_widgets_name'         => 'widget_post_count',
                'wp_diary_widgets_title'        => __( 'Post Count', 'wp-diary' ),
                'wp_diary_widgets_default'      => '5',
                'wp_diary_widgets_field_type'   => 'number'
            ),

        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        
        if ( empty( $instance ) ) {
            return ;
        }

        $wp_diary_widget_title = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];
        $wp_diary_post_order   = empty( $instance['widget_post_order'] ) ? 'default' : $instance['widget_post_order'];
        $wp_diary_post_count   = empty( $instance['widget_post_count'] ) ? '5' : $instance['widget_post_count'];

        echo $before_widget;
    ?>
            <div class="mt-latest-posts-wrapper">
                <?php
                    if ( !empty( $wp_diary_widget_title ) ) {
                        echo $before_title . esc_html( $wp_diary_widget_title ) . $after_title;
                    }
                ?>
                <div class="mt-posts-content-wrapper">
                    <?php
                        $wp_diary_posts_args = array(
                                'posts_per_page' => absint( $wp_diary_post_count )
                            );
                        if ( 'random' === $wp_diary_post_order ) {
                            $wp_diary_posts_args['orderby'] = 'rand';
                        }
                        $wp_diary_posts_query = new WP_Query( $wp_diary_posts_args );
                        if ( $wp_diary_posts_query->have_posts() ) {
                            while( $wp_diary_posts_query->have_posts() ) {
                                $wp_diary_posts_query->the_post();
                    ?>
                                <div class="mt-single-post-wrap">
                                    <?php if ( has_post_thumbnail() ){ ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <figure><div class="mt-post-thumb"><?php the_post_thumbnail( 'thumbnail' ); ?></div></figure>
                                        </a>
                                    <?php } ?>
                                    <div class="mt-post-content">
                                        <h5 class="mt-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <div class="mt-post-meta">
                                            <?php
                                                wp_diary_posted_on();
                                                wp_diary_posted_comments();
                                            ?>
                                        </div>
                                    </div>
                                </div><!-- .mt-single-post-wrap -->
                    <?php
                            }
                        }
                    ?>
                </div><!-- .mt-posts-content-wrapper -->
            </div><!-- .mt-latest-posts-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    wp_diary_widgets_updated_field_value()     defined in mt-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$wp_diary_widgets_name] = wp_diary_widgets_updated_field_value( $widget_field, $new_instance[$wp_diary_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    wp_diary_widgets_show_widget_field()       defined in mt-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $wp_diary_widgets_field_value = !empty( $instance[$wp_diary_widgets_name] ) ? wp_kses_post( $instance[$wp_diary_widgets_name] ) : '';
            wp_diary_widgets_show_widget_field( $this, $widget_field, $wp_diary_widgets_field_value );
        }
    }
}