<?php
/* START GETTING THEME FUNCTIONALITY SET UP */
// Add theme support for Post Formats.
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
// Add theme support for Post Thumbnails.
add_theme_support( 'post-thumbnails' );
// Add theme support for Automatic Feeds Links
add_theme_support( 'automatic-feed-links' );

// Define SITE_URL global variable for dev purposes.
define('SITE_URL', $_SERVER['HTTP_HOST']);

// Register Custom Menus
if ( function_exists( 'register_nav_menus' ) ) {
  register_nav_menus( );
}
/* END GETTING THEME FUNCTIONALITY SET UP */

/* START THEME FUNCTIONS */
function is_login_page() {
  return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if ( ! is_admin() && ! is_login_page() ) {
  // Enqueue Styles
  if ( ! function_exists( 'site_styles' ) ) {
    function site_styles() {
      wp_register_style( 'main', get_bloginfo( 'template_directory' ) . '/style.css', false, date('W.0') );
      wp_enqueue_style( 'main' );
    }
  }
  add_action( 'init', 'site_styles' );

  // Enqueue Scripts
  if ( ! function_exists( 'site_scripts' ) ) {
    function site_scripts() {
      wp_register_script( 'site-js', get_template_directory_uri() . '/javascripts/site.min.js', array('jquery'), date('W.0'), true );
      wp_enqueue_script( 'jquery' );
      wp_enqueue_script( 'site-js' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'site_scripts' );
}
