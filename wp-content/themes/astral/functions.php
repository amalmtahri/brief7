<?php
/**
 * astral functions and code
 *
 * @package Astral
 * @since 0.1
 *
 */
/**
 * Define constants
 */
define( 'ASTRAL_PARENT_DIR', get_template_directory() );
define( 'ASTRAL_PARENT_URI', get_template_directory_uri() );
define( 'ASTRAL_PARENT_INC_DIR', ASTRAL_PARENT_DIR . '/inc' );
define( 'ASTRAL_PARENT_INC_URI', ASTRAL_PARENT_URI . '/inc' );
define( 'ASTRAL_PARENT_CORE_URI', ASTRAL_PARENT_INC_URI . '/core/' );

define('astral_THEME_REVIEW_URL','https://wordpress.org/support/theme/astral/reviews/?filter=5');
/* 
 * require classes 
*/
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-abstract-main.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-slider-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-about-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-service-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-contact-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class-astral-blog-section.php';
require ASTRAL_PARENT_INC_DIR . '/core/class_nav_social_walker.php';

//require ASTRAL_PARENT_URI . '/google-font.php';

/* 
 * customizer class
*/
require( dirname( __FILE__ ) . '/inc/core/class-astral-customizer.php' );
/*
 * Load hooks.
*/
require ASTRAL_PARENT_INC_DIR . '/hooks.php';
require ASTRAL_PARENT_INC_DIR . '/header.php';
require ASTRAL_PARENT_INC_DIR . '/footer.php';

require ASTRAL_PARENT_INC_DIR . '/core/class-wp-bootstrap-navwalker.php';

/* 
 * theme extra function 
*/
require ASTRAL_PARENT_INC_DIR . '/theme-function.php';

/* class for thumbnail images */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'astral_service' ) ) :
	class astral_service extends WP_Customize_Control {  
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $args = array( 'post_type' => 'post', 'post_status'=>'publish'); 
				$slide_id = new WP_Query( $args ); ?>
				<select <?php $this->link(); ?> >
				<?php if($slide_id->have_posts()):
					while($slide_id->have_posts()):
						$slide_id->the_post(); ?>
						<option value= "<?php echo esc_attr(get_the_id()); ?>" <?php if($this->value()== get_the_id() ) echo 'selected="selected"';?>><?php the_title(); ?></option>
						<?php
					endwhile; 
				 endif; ?>
				</select>
		<?php
		}
	}
endif;


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function astral_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'astral_skip_link_focus_fix' );

/**
* display notice 
**/

if ( $pagenow == 'index.php' || $pagenow == 'themes.php' ) {
	add_action( 'admin_notices', 'astral_activation_notice' );
}

function astral_activation_notice(){
$my_theme = wp_get_theme();	
?>
    <style>
		a.reply-btn {
		    text-decoration: none;
		    display: inline-block;
		    padding: 12px;
		    color: #000;
		    font-size: 16px;
		    font-weight: 600;
		    background: #ffc107;
		}
		.hello-elementor-notice-content {
			padding: 28px;
		}
		.notice h3 {
		    font-size: 24px;
		    margin: 0 0 5px;
		    color: #fff;
		}
		.notice.updated.is-dismissible {
			padding: 15px;
		}
		a.rate-btn {
			font-size: 11px;
			text-decoration: none;
			background: #153e4d;
			padding: 3px 10px;
			color: #fff;
		}
		a.support-btn {
			margin-left: 10px;
			text-decoration: none;
		}
		.review-page {
			background: #1497ffdb !important;
			padding: 15px;
			border-left-color: #e0f0f7 !important;
		}
		.notice.updated.is-dismissible.review-page {
			border-left: 1px solid #ccd0d4 !important;
		}
		.corona-msg {
			padding: 17px 0 0 !important;
		}
		.corona-msg span {
		    font-style: oblique;
		    font-size: 19px;
		    font-weight: 600;
		    color: #ffbc00;
		}
		a.astral-pro {
			text-align: center;
		    line-height: 36px;
		    font-size: 19px;
		    background: #ffc107;
		    color: #000;
		    font-weight: 700;
		    border: 2px dashed #33a3fd;
		}
		@-webkit-keyframes blinker {
		  from {opacity: 1.0;}
		  to {opacity: 0.0;}
		}
		.blink {
		    text-decoration: blink;
		    -webkit-animation-name: blinker;
		    -webkit-animation-duration: 0.6s;
		    -webkit-animation-iteration-count: infinite;
		    -webkit-animation-timing-function: ease-in-out;
		    -webkit-animation-direction: alternate;
		}
	</style>

    <div class="notice updated is-dismissible review-page">
		<div class="hello-elementor-notice-inner">
			<div class="hello-elementor-notice-content">
				<div class="row">
					<div class="col-md-8" style="width: 56%;display: inline-block;">
						<h3> <?php _e('Thank you for installing', 'astral'); ?> <?php echo $my_theme->get( 'Name' ); ?>
						<?php echo esc_html_e('Version - ','astral'); ?>
						 <?php echo esc_html( $my_theme->get('Version') ); ?>
						</h3>
						
						<p style="margin-bottom: 18px;font-size: 15px;color:#fff;"><?php 
						_e(' Are you are enjoying Astral? We would love to hear your feedback. Big thanks in advance.','astral'); ?> </p>
						<a target="_blank" class="reply-btn" href="https://wordpress.org/support/theme/astral/reviews/#new-post"> <?php _e('Submit a review','astral'); ?> </a>
						
						<a target="_blank" class="reply-btn" style="margin-left: 18px;" href="<?php echo admin_url('/themes.php?page=astral'); ?>" > <?php _e('See Theme Preview','astral'); ?> </a>

						<a target="_blank" class="reply-btn" style="margin-left: 18px;" href="<?php echo admin_url('/themes.php?page=astral'); ?>" > <?php _e('Free Vs Pro','astral'); ?> </a>
					</div>

					<div class="col-md-4" style="width: 40%;display: inline-block;">
						<a target="_blank" class="astral-pro reply-btn" style="margin-left: 18px;" href="https://mywebapp.in/astral-premium/" >  <?php _e(' Astral Premium','astral'); ?> <br><strike> $25 </strike> &nbsp $18 <br> <?php  _e('Coupon Code ','astral'); ?> <span style="background: #33a3fd;color: #fff; padding: 4px;"> OFFER07D </span> </a> <sup style="color: #fff;"> Limited Period Offer</sup>
					</div>

				</div>
				
			</div>
		</div>
	</div>
<?php } 

/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'astral_Font_Control' ) ) :
class astral_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <?php  $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCEf2B8_jirXe78wunEHiuyYV0Jrqcw16g';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get($google_api_url, array('sslverify' => false )));
			if($response==''){ echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>'; }
			if( is_wp_error( $response ) ) {
			   echo 'Something went wrong!';
			} else {
			$json_fonts = json_decode($response,  true);
			// that's it
			$items = $json_fonts['items'];
			$i = 0; ?>
   <select <?php $this->link(); ?> >
   <?php foreach( $items as $item) { $i++; $str = $item['family']; ?>
    <option  value="<?php echo esc_attr($str); ?>" <?php if($this->value()== $str) echo 'selected="selected"';?>><?php echo esc_html($str); ?></option>
   <?php } ?>
    </select>
	<?php 
 }
}
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Layout_Picker_Custom_Control' ) ) :
/**
 * Class to create a custom layout control
 */
class Layout_Picker_Custom_Control extends WP_Customize_Control
{
      public function render_content() {

        if (empty($this->choices))
            return;

        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='theme-slug-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'theme-slug-radio-img-selected theme-slug-radio-img-img' : 'theme-slug-radio-img-img';
                ?>
                <li>
                    <label>
                        <input class="layout_select" <?php $this->link(); ?> style="display: none;" type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                                                      $this->link();
                                                      checked($this->value(), $value);
                                                      ?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    }
}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'astral_Toggle_Switch_Custom_control' ) ) :
	class astral_Toggle_Switch_Custom_control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'toggle_switch';

		/**
		 * Render the control in the customizer
		 */
		public function render_content(){
		?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
		<?php
		}
	}
endif;

if (is_admin()) {
	require_once('inc/astral-pro-intro.php');
}
?>