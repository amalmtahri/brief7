<?php
/**
 * @link       https://mysterythemes.com/
 * @since      1.0.8
 *
 * @package    Mystery Themes Demo Importer
 * @subpackage /admin
 * 
 */
if( !class_exists( 'MTDI_Admin_Dashboard_Widget' ) ) :
    class MTDI_Admin_Dashboard_Widget {
        /**
         * Instance
         *
         * @access private
         * @static
         *
         * @var MTDI_Admin_Dashboard_Widget The single instance of the class.
         */
        private static $_instance = null;

        /**
         * Ensures only one instance of the class is loaded or can be loaded.
         *
         * @access public
         * @static
         *
         * @return MTDI_Admin_Dashboard_Widget An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Load the dependencies, define fuctions and set the hooks for the admin area of the site.
         */
        public function __construct() {
            if( !is_admin() ) {
                return;
            }

            add_action( 'wp_dashboard_setup', array( $this, 'dashboard_widget_register' ), 0 );
        }

        /**
         * Register widget "Mysterythemes dashboard overview widget"
         * 
         */
        public function dashboard_widget_register() {
            wp_add_dashboard_widget(
                'mtdi_dashboard_overview',
                esc_html__( 'Mysterythemes Overview', 'mysterythemes-demo-importer' ),
                array( $this, 'mysterythemes_overview_widget' )
            );
        }

        /**
         * Callback function for dashboard overview section widget
         * 
         */
        public function mysterythemes_overview_widget() {
            $template = get_template();
            if( strpos( $template, '-pro' ) ) {
                $template = str_replace( '-pro', '', $template );
            }
            $demo_url = '//demo.mysterythemes.com/'.esc_html( $template ).'-demos/';
            $blog_url = '//mysterythemes.com/blog/';
            $support_url = '//mysterythemes.com/support/';
        ?>
            <div id="mtdi-overview-wrap">
                <div class="activity-block">
                    <strong><?php printf( esc_html__( 'News %s Updates', 'mysterythemes-demo-importer' ), '&amp;' ); ?></strong>
                </div>
                <div class="wordpress-news">
                    <?php
                        $mysterythemes_json = wp_remote_get( esc_url_raw( 'https://mysterythemes.com/wp-json/wp/v2/posts?per_page=3&order=desc&orderby=rand' ) );
                        $wpallresources_json = wp_remote_get( esc_url_raw( 'https://wpallresources.com/wp-json/wp/v2/posts?per_page=2&order=desc&orderby=rand' ) );
                        $mysterythemes_response_code =  wp_remote_retrieve_response_code( $mysterythemes_json );
                        $mysterythemes_json_body =  wp_remote_retrieve_body( $mysterythemes_json );
                        $wpallresources_response_code =  wp_remote_retrieve_response_code( $wpallresources_json );
                        $wpallresources_json_body =  wp_remote_retrieve_body( $wpallresources_json );
                        $decoded_posts = array_merge( json_decode( $mysterythemes_json_body, true ), json_decode( $wpallresources_json_body, true ) );
                        if( !empty( $decoded_posts ) || !is_wp_error( $decoded_posts ) ) {
                            echo '<ul class="mtdi-news-items">';
                                foreach( $decoded_posts as $decoded_post ) :
                                ?>
                                    <li class="mtdi-news-item">
                                        <div>
                                            <a href="<?php echo esc_url( $decoded_post['link'] ); ?>" target="_blank">
                                                <?php echo esc_html( $decoded_post['title']['rendered'] ); ?>
                                            </a>
                                        </div>
                                        <span class="mtdi-news-updated">
                                            <?php
                                                $date = new DateTime( $decoded_post['modified_gmt'] );
                                                echo esc_html__( 'Updated on: ', 'mysterythemes-demo-importer' );
                                                echo esc_html( date_format( $date, 'F d, Y' ) );
                                            ?>
                                        </span>
                                    </li>
                                <?php
                                endforeach;
                            echo '</ul>';
                        } else {
                            printf( '<strong>%s</strong>', esc_html__( 'No news and updates found at current time', 'mysterythemes-demo-importer' ) );    
                        }
                    ?>
                </div>
                <div class="community-events-footer">
                    <a href="<?php echo esc_url( $demo_url ); ?>" target="_blank">
                        <?php esc_html_e( 'Demos', 'mysterythemes-demo-importer' ); ?>
                        <span class="dashicons dashicons-external">
                        </span>
                    </a>
                    <?php echo esc_attr( '|' ); ?>
                    <a href="<?php echo esc_url( $blog_url ); ?>" target="_blank">
                        <?php esc_html_e( 'Blogs', 'mysterythemes-demo-importer' ); ?>
                        <span class="dashicons dashicons-external">
                        </span>
                    </a>
                    <?php echo esc_attr( '|' ); ?>
                    <a href="<?php echo esc_url( $support_url ); ?>" target="_blank">
                        <?php esc_html_e( 'Support', 'mysterythemes-demo-importer' ); ?>
                        <span class="dashicons dashicons-external">
                        </span>
                    </a>
                </div>
            </div>
        <?php
        }
    }
    MTDI_Admin_Dashboard_Widget::instance();
endif;