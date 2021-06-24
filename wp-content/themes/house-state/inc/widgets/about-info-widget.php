<?php
/**
 * Custom Advertisement Image Widget
 *
 * @package House State
 * @since House State 1.0
 */

if ( ! class_exists( 'house_state_About_Us_Image_Widget' ) ) :

	/**
	 * Adds Tp image widget.
	 */
	class House_State_About_Us_Image_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'widget_about',
				'description' => esc_html__( 'An widget to upload About Content and images in sidebar.', 'house-state' ),
			);
			parent::__construct( 'widget_about', esc_html__('TP: About Us Image','house-state'), $widget_ops );
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
			extract( $args , EXTR_SKIP );

			$tpiw_title   			= ( ! empty( $instance['title'] ) ) ? ( $instance['title'] ) : '';

            $tpiw_title   			= apply_filters( 'widget_title', $tpiw_title , $instance, $this->id_base );

            $tpiw_name   			= ( ! empty( $instance['name'] ) ) ? ( $instance['name'] ) : '';

            $tpiw_description   	= ( ! empty( $instance['description'] ) ) ? ( $instance['description'] ) : '';

			$tpiw_image_url     	= ! empty( $instance['tpiw_image_url'] ) ? $instance['tpiw_image_url'] : '';
	        $open_link  			= ! empty( $instance['open_link'] ) ? true : false;
			$target 				= ( empty( $open_link ) ) ? '' : 'target="_blank"';
			$number 				= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3; 

			echo $args['before_widget'];
				if ( ! empty( $tpiw_title ) ) {
					echo $args['before_title'] . esc_html( $tpiw_title ) . $args['after_title'];
				}
			?>

	            <div class="aboutwidget">
		            <?php
		                if ( ! empty( $tpiw_image_url ) ) {
							$sizes = array();
							echo  '<img src="' . esc_url( $tpiw_image_url ) . '" alt="' . esc_attr( $tpiw_name  ) . '"  />';
				        } // End if : image is there.
				    ?>
		                <p><?php echo esc_html( $tpiw_description ); ?> </p>

		                <div class="social-icons">
		                    <ul>
								<?php
								for ( $i=1; $i <= $number ; $i++ ) {
									$link = ( ! empty( $instance['link' . '-' . $i] ) ) ? $instance['link' . '-' . $i] : ''; 
									if ( ! empty( $link ) ) :
								?>
							        <li>
							        	<a href="<?php echo esc_url( $link ) . '" ' . esc_attr( $target ); ?>"><?php echo house_state_return_social_icon( $link ); ?>
							        	</a>
							        </li>
								<?php endif;
								} ?>
				     		</ul>
		                </div><!-- .social-icons -->
	            </div><!-- .textwidget -->
        <?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			// Defaults.
	        $instance = wp_parse_args( (array) $instance, array(
				'title'                	=>  '',
				'description'           =>  '',
				'tpiw_image_url'       	=>  '',
				'tpiw_link'            	=>  '',
				'number'        		=>  3,
				'open_link'       		=>  0,
	      	) );

			$tpiw_title                	= htmlspecialchars( $instance['title'] );
			$tpiw_description           = htmlspecialchars( $instance['description'] );
			$tpiw_image_url             = isset( $instance['tpiw_image_url'] ) ? $instance['tpiw_image_url'] : '';
			$number 	= isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
			$open_link 	= isset( $instance['open_link'] ) ? $instance['open_link'] : false;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title :', 'house-state' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $tpiw_title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description :', 'house-state' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"  value="<?php echo esc_attr( $tpiw_description ); ?>"> <?php echo wp_kses_post( $tpiw_description ); ?> </textarea>
			</p>


			<!-- Place holder for image upload -->
			<div>
				<label for="<?php echo esc_attr( $this->get_field_id( 'tpiw_image_url' ) ); ?>"><?php esc_html_e( 'Image URL', 'house-state' ); ?></label>:<br />
				<input type="url" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'tpiw_image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'tpiw_image_url' ) ); ?>" value="<?php echo esc_url( $tpiw_image_url ); ?>" /><br />
				<input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'house-state' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Image', 'house-state' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'house-state' ); ?>" style="margin-top:5px;" />

		      	<?php
			        $full_image_url = '';
			        if (! empty( $tpiw_image_url ) ){
			          $full_image_url = $tpiw_image_url;
			        }
			        $wrap_style = '';
			        if ( empty( $full_image_url ) ) {
			          $wrap_style = ' style="display:none;" ';
			        }
		      	?>
		      	<div class="tpiw-preview-wrap" <?php echo esc_attr( $wrap_style ); ?>>
		        	<img src="<?php echo esc_url( $full_image_url ); ?>" alt="<?php esc_attr_e('Preview', 'house-state'); ?>" style="max-width: 100%;"/>
		      	</div><!-- .tpiw-preview-wrap -->

	    	</div>

		   <p>
			   	<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of links to show:', 'house-state' ); ?></label>
			   	<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="6" value="<?php echo absint( $number ); ?>" size="3" />
		   </p>

		   <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>"><?php esc_html_e( 'Open Social link in New Tab', 'house-state' ); ?>:</label>
		      	<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'open_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'open_link' ), 'house-state' ); ?>"  <?php checked( $open_link, true ); ?> />
		   </p>

		   <?php for ( $i=1; $i <= $number; $i++ ) {
		   	$link = isset( $instance['link'. '-' . $i ] ) ? $instance['link' . '-' . $i ] : '';?>
			   <p>
				   	<label for="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>"><?php printf( esc_html__( 'Link %s :', 'house-state' ), $i ); ?></label>
				   	<input type="url" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' . '-' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' . '-' . $i ) ); ?>" value="<?php echo esc_url( $link ); ?>"/>
		     	</p>
		   <?php }?>
		<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                         = $old_instance;

			$instance['title']               = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ): '';
			$instance['description']         = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ): '';
			$instance['tpiw_image_url']      = esc_url_raw( $new_instance['tpiw_image_url'] );
			$instance['number'] 			= absint( $new_instance['number'] );
			$instance['open_link']       	= house_state_sanitize_checkbox( $new_instance['open_link'] );
			for ( $i=1; $i <= $instance['number']; $i++ ) {
				$instance['link' . '-' . $i] = esc_url_raw( $new_instance['link' . '-' . $i] );
			}

			return $instance;
		}

	} // class tp_about_us_image_widget
endif;

/**
 * Enqueue admin scripts for Image Widget
 * @uses  wp_enqueue_script, and  admin_enqueue_scripts hook
 *
 * @since House State 1.0
 */
function house_state_about_us_image_widget_upload_enqueue( $hook ) {

  if( 'widgets.php' !== $hook )
      return;

  wp_enqueue_media();
  wp_enqueue_script( 'house-state-image-widget-upload-script', get_template_directory_uri() . '/assets/js/upload' . house_state_min() . '.js', array( 'jquery' ), '1.1', true );

}
add_action( 'admin_enqueue_scripts', 'house_state_about_us_image_widget_upload_enqueue' );