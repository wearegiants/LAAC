<?php

// General Thangs
require_once locate_template('/lib/blankslate.php');
//require_once locate_template('/lib/activation.php');
require_once locate_template('/lib/themewrangler.class.php');
require_once locate_template('/lib/enque.php');

// // ACF Includes
// include_once locate_template('/lib/advanced-custom-fields/acf.php' );
// include_once locate_template('/lib/acf-repeater/acf-repeater.php' );
// include_once locate_template('/lib/acf-gallery/acf-gallery.php' );

// Theme Mods
include_once locate_template('/lib/soil-master/soil.php' );
include_once locate_template('/lib/roots-rewrites-master/roots-rewrites.php' );
include_once locate_template('/lib/opengraph/opengraph.php' );

// Roots Plugin stuff
add_theme_support('soil-nice-search');
add_theme_support('soil-clean-up');
add_theme_support('soil-relative-urls');
add_theme_support('soil-disable-trackbacks');

// Image Sizes
add_image_size( 'homepage-thumb-full', 1400, 600, true );
add_image_size( 'homepage-thumb-main', 1400, 700, true );
add_image_size( 'homepage-thumb-half', 700, 600, true );
add_image_size( 'homepage-thumb-square', 600, 600, true );

//define( 'ACF_LITE', true );



// Text Wrangler
$settings = array(

'available_scripts' => array(
'jquery'           => array('//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js','3.3.1'),
'scripts'          => array('/assets/javascripts/scripts.min.js'),
),

'default_scripts' => array(
//'jquery',
//'scripts'
),

'available_stylesheets' => array(
'default'      => array('/assets/css/main.css'),
'layout'       => array('/assets/css/layout.css'),
'update'       => array('/assets/css/site.min.css'),
'grid'         => array('/assets/css/grid.css'),
'twitter'      => array('/assets/css/twitter.css'),
'themestylesheet'  => array(get_stylesheet_uri()),
),


'default_stylesheets' => array(
'default',
'grid',
'twitter',
'themestylesheet',
),

'deregister_scripts' => array('jquery','l10n')

);

Themewrangler::set_defaults( $settings );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

class clean_nav extends Walker {
    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    function start_lvl(&$output, $depth=0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth=0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes = in_array( 'current-menu-item', $classes ) ? array( 'current-menu-item' ) : array();
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = strlen( trim( $class_names ) ) > 0 ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', '', $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' class="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</li>\n";
    }
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}

//wp_oembed_add_provider( $format, $provider, $regex ); 


if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'primary-navigation' => 'Primary',
          'athletics' => 'Athletics',
          'events' => 'Events'
        )
    );

}

// add tag support to pages
//function tags_support_all() {
//    register_taxonomy_for_object_type('post_tag', 'page');
//}

// ensure all tags are included in queries
//function tags_support_query($wp_query) {
//    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
//}

// tag hooks
//add_action('init', 'tags_support_all');
//add_action('pre_get_posts', 'tags_support_query');



/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}