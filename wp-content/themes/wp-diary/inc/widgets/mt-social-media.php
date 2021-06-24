<?php
/**
 * MT: Social Media
 *
 * Widget show the social media icons.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

class WP_Diary_Social_Media extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'wp_diary_social_media',
            'description' => __( 'A widget shows the social media icons.', 'wp-diary' )
        );
        parent::__construct( 'wp_diary_social_media', __( 'MT: Social Media', 'wp-diary' ), $widget_ops );
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
            )
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

        $wp_diary_widget_title  = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];

        $get_social_media_icons = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons );

        echo $before_widget;
    ?>
            <div class="mt-aside-social-wrapper">
                <?php
                    if ( ! empty( $wp_diary_widget_title ) ) {
                        echo $before_title . esc_html( $wp_diary_widget_title ) . $after_title;
                    }
                ?>
                <div class="mt-social-icons-wrapper">
                    <?php wp_diary_social_media_content(); ?>
                </div><!-- .mt-social-icons-wrapper -->
            </div><!-- .mt-aside-social-wrapper -->
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