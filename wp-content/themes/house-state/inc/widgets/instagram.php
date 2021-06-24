<?php
/**
 * Instagram Widget
 *
 * @package House State
 * @since House State 1.0
 */

if ( ! class_exists( 'house_state_Instagram_Widget' ) ) :
	/**
	 * Instragram class.
	 * 
	 */
	class House_State_Instagram_Widget extends WP_Widget {

		/**
		 * Holds widget settings defaults, populated in constructor.
		 *
		 * @var array
		 */
		protected $defaults;

		/**
		 * Constructor. Set the default widget options and create widget.
		 *
		 * @since 1.0
		 */
		function __construct() {
			$this->defaults = array(
				'title'    => esc_html__( 'Instagram', 'house-state' ),
				'username' => '',
				'layout'   => 'one-column',
				'number'   => 5,
				'size'     => 'small',
				'target'   => 0,
				'link_text'     => '',
			);

			$tp_widget_instagram = array(
				'classname'   => 'widget_instagram tp-instagram tpinstagram',
				'description' => esc_html__( 'Displays your latest Instagram photos', 'house-state' ),
			);

			$tp_control_instagram = array(
				'id_base' => 'tp-instagram',
			);

			parent::__construct(
				'tp-instagram', // Base ID
				esc_html__( 'TP: Instagram', 'house-state' ), // Name
				$tp_widget_instagram,
				$tp_control_instagram
			);
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->defaults );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'house-state' ); ?>:</label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'house-state' ); ?>:</label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" value="<?php echo esc_attr( $instance['username'] ); ?>" class="widefat" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php esc_html_e( 'Layout', 'house-state' ); ?>:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" class="widefat">
					<?php
						$post_type_choices = array(
							'one-column'  => esc_html__( '1 Column', 'house-state' ),
							'two-column'  => esc_html__( '2 Column', 'house-state' ),
							'three-column'  => esc_html__( '3 Column', 'house-state' ),
						);

					foreach ( $post_type_choices as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '" '. selected( $key, $instance['layout'], false ) .'>' . esc_html( $value ) .'</option>';
					}
					?>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'house-state' ); ?>:</label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo absint( $instance['number'] ); ?>" class="small-text" min="1" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Instagram Image Size', 'house-state' ); ?>:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
					<?php
						$post_type_choices = array(
							'thumbnail' => esc_html__( 'Thumbnail', 'house-state' ),
							'small'     => esc_html__( 'Small', 'house-state' ),
							'large'     => esc_html__( 'Large', 'house-state' ),
							'original'  => esc_html__( 'Original', 'house-state' ),
						);

					foreach ( $post_type_choices as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '" '. selected( $key, $instance['size'], false ) .'>' . esc_html( $value ) .'</option>';
					}
					?>
				</select>
			</p>

			 <p>
	        	<input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ) ?> id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>" />
	        	<label for="<?php echo esc_attr( $this->get_field_id('target' ) ); ?>"><?php esc_html_e( 'Check to Open Link in new Tab/Window', 'house-state' ); ?></label><br />
	        </p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link text', 'house-state' ); ?>:
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link_text'] ); ?>" /></label></p>
			<?php

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']    = sanitize_text_field( $new_instance['title'] );
			$instance['username'] = sanitize_text_field( $new_instance['username'] );
			$instance['layout']   = sanitize_key( $new_instance['layout'] );
			$instance['number']   = absint( $new_instance['number'] );
			$instance['size']     = sanitize_key( $new_instance['size'] );
			$instance['target']   = house_state_sanitize_checkbox( $new_instance['target'] );
			$instance['link_text']     = sanitize_text_field( $new_instance['link_text'] );

			return $instance;
		}

		function widget( $args, $instance ) {
			// Merge with defaults
			$instance = wp_parse_args( (array) $instance, $this->defaults );

			echo $args['before_widget'];

			// Set up the author bio
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
			}

			$username = empty( $instance['username'] ) ? '' : $instance['username'];
			$number   = empty( $instance['number'] ) ? 9 : $instance['number'];
			$size     = empty( $instance['size'] ) ? 'large' : $instance['size'];
			$link_text     = empty( $instance['link_text'] ) ? '' : $instance['link_text'];

			$target = '_self';

			if ( $instance['target'] ) {
				$target = '_blank';
			}

			if ( '' != $username ) {

				$media_array = $this->scrape_instagram( $username, $number );

				if ( is_wp_error( $media_array ) ) {

					echo wp_kses_post( $media_array->get_error_message() );

				}
				else {
					// filter for images only?
					if ( $images_only = apply_filters( 'house_state_images_only', FALSE ) ) {
						$media_array = array_filter( $media_array, array( $this, 'images_only' ) );
					}
					?>

					<ul class="<?php echo esc_attr( $instance['layout'] ); ?>">
					<?php
						foreach ( $media_array as $item ) {
							echo '
							<li class="hentry">
								<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'">
									<img src="'. esc_url( $item[$size] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"/>
								</a>
							</li>';
						}
					?>
					</ul>
				<?php
				}
			}

			$linkclass = apply_filters( 'house_state_link_class', 'clear' );

			if ( '' != $link_text ) {
				?>
				<p class="<?php echo esc_attr( $linkclass ); ?>">
					<a class="genericon genericon-instagram" href="//instagram.com/<?php echo esc_attr( trim( $username ) ); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><span><?php echo esc_html( $link_text ); ?></span></a>
				</p>
				<?php
			}

			echo $args['after_widget'];
		}

		// based on https://gist.github.com/cosmocatalano/4544576
		function scrape_instagram( $username, $slice = 9 ) {

			$username = trim( strtolower( $username ) );

			switch ( substr( $username, 0, 1 ) ) {
				case '#':
					$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
					$transient_prefix = 'h';
					break;

				default:
					$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
					$transient_prefix = 'u';
					break;
			}

			if ( false === ( $instagram = get_transient( 'insta-a3-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

				$remote = wp_remote_get( $url );

				if ( is_wp_error( $remote ) ) {
					return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'house-state' ) );
				}

				if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
					return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'house-state' ) );
				}

				$shards      = explode( 'window._sharedData = ', $remote['body'] );
				$insta_json  = explode( ';</script>', $shards[1] );
				$insta_array = json_decode( $insta_json[0], true );

				if ( ! $insta_array ) {
					return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'house-state' ) );
				}

				if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
					$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
				} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
					$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
				} else {
					return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'house-state' ) );
				}

				if ( ! is_array( $images ) ) {
					return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'house-state' ) );
				}

				$instagram = array();

				foreach ( $images as $image ) {
					if ( true === $image['node']['is_video'] ) {
						$type = 'video';
					} else {
						$type = 'image';
					}

					$caption = __( 'Instagram Image', 'house-state' );
					if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
						$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
					}

						$image['link']        = trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] );
						$image['time']        = $image['node']['taken_at_timestamp'];
						$image['comments']    = $image['node']['edge_media_to_comment']['count'];
						$image['likes']       = $image['node']['edge_liked_by']['count'];
						$image['thumbnail']   = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] );
						$image['small']       = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] );
						$image['large']       = preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] );
						$image['original']    = preg_replace( '/^https?\:/i', '', $image['node']['display_url'] );

					$instagram[] = array(
						'description'   => $caption,
						'link'		  	=> $image['link'],
						'time'		  	=> $image['time'],
						'comments'	  	=> $image['comments'],
						'likes'		 	=> $image['likes'],
						'thumbnail'	 	=> $image['thumbnail'],
						'small'			=> $image['small'],
						'large'			=> $image['large'],
						'original'		=> $image['original'],
						'type'		  	=> $type
					);
				} // End foreach().

				// do not set an empty transient - should help catch private or empty accounts.
				if ( ! empty( $instagram ) ) {

					set_transient( 'insta-a3-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'house_state_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
				}
			}

			if ( ! empty( $instagram ) ) {

				return array_slice( $instagram, 0, $slice );

			} else {

				return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'house-state' ) );

			}
		}

		function images_only( $media_item ) {
			if ( $media_item['type'] == 'image' ) {
				return true;
			}

			return false;
		}
	}
endif;

