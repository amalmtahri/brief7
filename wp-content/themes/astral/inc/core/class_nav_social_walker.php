<?php 
/**
* Custom Social Media Nav Walker by Aurooba Ahmed
* This uses Font Awesome and adds in the correct icon by detecting the URL of the menu item.
* You can use this by doing a custom wp_nav_menu query:
* wp_nav_menu(array('items_wrap'=> '%3$s', 'walker' => new WO_Nav_Social_Walker(), 'container'=>false, 'menu_class' => '', 'theme_location'=>'social', 'fallback_cb'=>false ));
*
*/
class WO_Nav_Social_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent\n";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		$output .= $indent . '';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
        if (strpos($item->url, 'facebook') !== false) {
            $item_output .= '<a'. $attributes .'><i class="fa fa-facebook-f"></i>';
            $item_output .= '</a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'twitter') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-twitter">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'instagram') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-instagram">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'youtube') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-youtube-play">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        }  elseif (strpos($item->url, 'snapchat') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-snapchat">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'vimeo') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-vimeo-v">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'googleplus') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-googleplus">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'github') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-github">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'linkedin') !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-linkedin">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, $item->url ) !== false)  {
            $item_output .= '<a'. $attributes .'><i class="fa fa-chain">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        }
		
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}