<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage House State
 * @since House State 1.0.0
 */

$options = house_state_get_theme_options();
$image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri().'/assets/uploads/no-featured-image-600x450.jpg';
?>
<article id="post-<?php the_ID(); ?>">
    <div class="post-item-wrapper">       
        <div class="featured-image" style="background-image: url('<?php echo esc_url( $image ); ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
        </div><!-- .featured-image --> 

       <div class="entry-container">
            <div class="entry-meta">
                <?php house_state_posted_on(); ?>
            </div><!-- .entry-meta -->
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
           
            <div class="read-more">
                    <a href="<?php the_permalink(); ?>">
                        <?php echo esc_html__( '+', 'house-state' ); ?>
                    </a>
            </div>
            <div class="entry-content">   
                <?php the_excerpt() ?>
            </div>
        </div><!-- .entry-container -->
    </div>
</article>
