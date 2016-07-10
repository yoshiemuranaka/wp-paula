<?php

/****************************************** 
	Optimizing site
 *****************************************/

/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */

function remove_empty_p( $content ) {
    $content = force_balance_tags( $content );
    $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
    $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
    return $content;
}
add_filter('the_content', 'remove_empty_p', 20, 1);

/*
disabling comments
*/
add_filter( 'pre_comment_content', 'esc_html' );

/*
turn off post revisions
*/
define( 'WP_POST_REVISIONS', false);

/*
change autosave interval
*/
define( 'AUTOSAVE_INTERVAL', 120 );

/*
removing some meta data
*/
remove_action( 'wp_head', 'wp_generator' ) ;
remove_action( 'wp_head', 'wlwmanifest_link' ) ;
remove_action( 'wp_head', 'rsd_link' ) ;

/*
removing query strings from static resources
*/
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function remove_admin_menu_items() {
  $remove_menu_items = array(__('Comments'));
  global $menu;
  end ($menu);
  while (prev($menu)){
    $item = explode(' ',$menu[key($menu)][0]);
    if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
    unset($menu[key($menu)]);}
  }
}

add_action('admin_menu', 'remove_admin_menu_items');

/****************************************** 
	Creating custom post types
 *****************************************/

add_action( 'init', 'create_post_type' );
function create_post_type() {
  //COLLECTIONS POST TYPE
  register_post_type( 'collections',
    array(
      'labels' => array(
        'name' => __( 'Collections' ),
        'singular_name' => __( 'Collection' )
      ),
      'public' => true,
      'has_archive' => false,
      'menu_icon' => 'dashicons-format-gallery',
      'publicly_queryable' => true,
    )
  );
}

/****************************************** 
  Enqueue Scripts
 *****************************************/

function load_vendor_javascript() {

  /* Featherlight */
  wp_enqueue_style( 'featherlight', get_template_directory_uri() . '/js/vendor/featherlight/featherlight.css' );
  wp_enqueue_style( 'featherlight-gallery', get_template_directory_uri() . '/js/vendor/featherlight/featherlight.gallery.min.css' );

  wp_register_script('featherlight', get_stylesheet_directory_uri() . '/js/vendor/featherlight/featherlight.min.js', 'jquery', false);
   wp_register_script('featherlightgallery', get_stylesheet_directory_uri() . '/js/vendor/featherlight/featherlight.gallery.min.js', 'jquery', false);


  /* custom javascript */
  wp_register_script('interactions', get_stylesheet_directory_uri() . '/js/interactions.js', 'jquery', false );
  
  wp_enqueue_script('jquery');
  wp_enqueue_script('featherlight');
  wp_enqueue_script('featherlightgallery');
  wp_enqueue_script('interactions');
}
add_action( 'wp_enqueue_scripts', 'load_vendor_javascript' );






