<?php

namespace App\Controllers;
use Walker_Nav_Menu;

class WP_Tuttnauer_Walker extends Walker_Nav_Menu
{

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;

        $indent = ( $depth ) ? str_repeat( "", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;


        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';

        if($depth == 2 && in_array('category', $classes) ){
            // get user defined attributes for thumbnail images
            $attr_defaults = array( 'class' => 'nav_thumb' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
            $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
            $attr = wp_parse_args( $attr , $attr_defaults );

            $item_output .= apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth );
        }
        // menu link output

//		if ( $args->has_children ) {
//			$item_output .= $depth . '';
//		}

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        // menu dropdown output based on depth and submenu

        if ( in_array('menu-item-has-children', $classes)){
            $item_output .= '<span class="sub-menu-item'. ($depth + 1) .'"></span>';
        }

        // close menu link anchor
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

//add_filter( 'wp_nav_menu_args', 'my_add_menu_descriptions' );
function my_add_menu_descriptions( $args ) {
    if ( $args['theme_location'] == 'menu-1' ) {
        $args['walker']         = new WP_Tuttnauer_Walker;
        $args['desc_depth']     = 0;
        $args['thumbnail']      = true;
        $args['thumbnail_link'] = true;
        $args['thumbnail_size'] = 'full';
        $args['thumbnail_attr'] = array( 'class' => 'nav_thumb my_thumb', 'alt' => 'test', 'title' => 'test' );
    }

    return $args;
}