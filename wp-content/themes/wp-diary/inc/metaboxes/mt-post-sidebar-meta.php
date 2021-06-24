<?php
/**
 * Functions for rendering meta boxes in post/page
 * 
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/*----------------------------------------------------------------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'wp_diary_sidebar_metaboxes', 10, 2 );

function wp_diary_sidebar_metaboxes() {
    
    add_meta_box(
        'wp_diary_post_sidebar',
        __( 'Sidebar Layout', 'wp-diary' ),
        'wp_diary_sidebar_callback',
        'post',
        'normal',
        'default'
    );
    
    add_meta_box(
        'wp_diary_post_sidebar',
        __( 'Sidebar Layout', 'wp-diary' ),
        'wp_diary_sidebar_callback',
        'page',
        'normal',
        'default'
    );
    
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/
function wp_diary_sidebar_callback( $post ) {

    // Setup our options.
    $wp_diary_page_sidebar_option = array(
        'default-sidebar' => array(
            'id'        => 'post-default-sidebar',
            'value'     => 'layout--default-sidebar',
            'label'     => __( 'Default Sidebar', 'wp-diary' ),
            'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
        ),
        'left-sidebar' => array(
            'id'        => 'post-left-sidebar',
            'value'     => 'left-sidebar',
            'label'     => __( 'Left sidebar', 'wp-diary' ),
            'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'
        ),
        'right-sidebar' => array(
            'id'        => 'post-right-sidebar',
            'value'     => 'right-sidebar',
            'label'     => __( 'Right sidebar', 'wp-diary' ),
            'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'
        ),
        'no-sidebar'    => array(
            'id'        => 'post-no-sidebar',
            'value'     => 'no-sidebar',
            'label'     => __( 'No sidebar Full width', 'wp-diary' ),
            'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
        ),
        'no-sidebar-center' => array(
            'id'        => 'post-no-sidebar-center',
            'value'     => 'no-sidebar-center',
            'label'     => __( 'No sidebar Content Centered', 'wp-diary' ),
            'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
        )
    );

    // Check for previously set.
    $post_sidebar_layout = get_post_meta( $post->ID, 'wp_diary_post_sidebar_layout', true );

    // If it is then we use it otherwise set to default.
    $post_sidebar_layout = ( $post_sidebar_layout ) ? $post_sidebar_layout : 'layout--default-sidebar';

    // Create our nonce field.
    wp_nonce_field( 'wp_diary_nonce_' . basename( __FILE__ ) , 'wp_diary_sidebar_layout_nonce' );
    ?>
        <div class="mt-meta-options-wrap">
            <div class="buttonset">
                <?php
                    foreach ( $wp_diary_page_sidebar_option as $field ) {
                ?>
                        <input type="radio" id="<?php echo esc_attr( $field['id'] ); ?>" value="<?php echo esc_attr( $field['value'] ); ?>" name="wp_diary_post_sidebar_layout" <?php checked( $field['value'], $post_sidebar_layout ); ?> />
                        <label for="<?php echo esc_attr( $field['id'] ); ?>">
                            <span class="screen-reader-text"><?php echo esc_html( $field['label'] ); ?></span>
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" title="<?php echo esc_attr( $field['label'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />
                        </label>
                    
                <?php } ?>
            </div><!-- .buttonset -->
        </div><!-- .mt-meta-options-wrap  -->
    <?php
}

/*----------------------------------------------------------------------------------------------------------------------------------------*/
add_action( 'save_post', 'wp_diary_save_post_meta' );

function wp_diary_save_post_meta( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST['wp_diary_sidebar_layout_nonce'] ) && wp_verify_nonce( $_POST['wp_diary_sidebar_layout_nonce'], 'wp_diary_nonce_' . basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
        return;
    }

    // Check for out input value.
    if ( isset( $_POST['wp_diary_post_sidebar_layout'] ) ) {
        
        // We validate making sure that the option is something we can expect.
        $value = in_array( $_POST['wp_diary_post_sidebar_layout'], array( 'no-sidebar', 'left-sidebar', 'right-sidebar', 'no-sidebar-center', 'layout--default-sidebar' ) ) ? $_POST['wp_diary_post_sidebar_layout'] : 'layout--default-sidebar';
        
        // We update our post meta.
        update_post_meta( $post_id, 'wp_diary_post_sidebar_layout', $value );
    }
}