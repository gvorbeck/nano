<?php
/* START GETTING THEME FUNCTIONALITY SET UP */
// Add theme support for Post Formats.
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
// Add theme support for Post Thumbnails.
add_theme_support( 'post-thumbnails' );
// Add theme support for Automatic Feeds Links
add_theme_support( 'automatic-feed-links' );
// Add theme support for HTML5
$args = array(
  'search-form',
  'comment-form',
  'comment-list',
  'gallery',
  'caption'
);
add_theme_support( 'html5', $args );

// Define SITE_URL global variable for dev purposes.
define('SITE_URL', $_SERVER['HTTP_HOST']);

// Register Custom Menus
if ( function_exists( 'register_nav_menus' ) ) {
  function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );
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
      wp_enqueue_script( 'comment-reply' );
      wp_enqueue_script( 'site-js' );
    }
  }
  add_action( 'wp_enqueue_scripts', 'site_scripts' );
}

// Replaces the excerpt "more" text by a link
function conduit_excerpt_more($more) {
  global $post;
  return ' <a class="post--more" href="'. get_permalink($post->ID) . '">Read more...</a>';
}
add_filter('excerpt_more', 'conduit_excerpt_more');

function conduit_svg_hamburger() {
  return '<svg class="svg svg--hamburger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 18h18v-2H3V18z M3 13h18v-2H3V13z M3 6v2h18V6H3z"/></svg>';
}
function conduit_svg_gear() {
  return '<svg class="svg svg--admin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21.59px" height="21.137px" viewBox="0 0 21.59 21.137" xml:space="preserve"><path d="M18.622 8.145L18.077 6.85c0 0 1.268-2.861 1.156-2.971L17.554 2.2 c-0.116-0.113-2.978 1.193-2.978 1.193L13.256 2.9c0 0-1.166-2.9-1.326-2.9H9.561C9.396 0 8.3 2.9 8.3 2.906L6.999 3.4 c0 0-2.922-1.242-3.034-1.131L2.289 3.951C2.173 4.1 3.5 6.9 3.5 6.867L2.962 8.16C2.962 8.2 0 9.3 0 9.455v2.322 c0 0.2 3 1.2 3 1.219l0.545 1.291c0 0-1.268 2.859-1.157 2.969l1.678 1.643c0.114 0.1 2.977-1.195 2.977-1.195 l1.321 0.535c0 0 1.2 2.9 1.3 2.898h2.369c0.164 0 1.244-2.906 1.244-2.906l1.322-0.535c0 0 2.9 1.2 3 1.1 l1.678-1.641c0.117-0.115-1.22-2.916-1.22-2.916l0.544-1.293c0 0 2.963-1.143 2.963-1.299v-2.32 C21.59 9.2 18.6 8.1 18.6 8.145z M14.256 10.568c0 1.867-1.553 3.387-3.461 3.387c-1.906 0-3.461-1.52-3.461-3.387 s1.555-3.385 3.461-3.385C12.704 7.2 14.3 8.7 14.3 10.568z" class="style1"/></svg>';
}
