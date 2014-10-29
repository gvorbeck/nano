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

function conduit_comment_list( $id ) {
  $comments = get_comments( array( 'post_id' => $id ) );
  echo '<div class="post--comment-list">';
    echo '<h2>Comments</h2>';
    foreach ( $comments as $c ) {
      $unix_time = strtotime( $c->comment_date );
      $args      = '';
      echo '<article id="comment-' . $c->comment_ID . '" class="post--comment">';
        echo '<header>' . get_avatar( $c->comment_author_email, 96 ) . '<h1>' . $c->comment_author . '</h1><time datetime="' . date( 'Y-m-d H:i', $unix_time ) . '">' . date( 'l, F jS \a\t g:iA', $unix_time ) . '</time></header>';
        echo 'hello' . get_comment_reply_link();
        echo '<div class="post--comment-content">' . apply_filters( 'the_content', $c->comment_content ) . '</div>';
      echo '</article>';
      
      echo '<!-- ';
      var_dump($c);
      echo ' -->';
    }
  echo '</div>';
}
function conduit_svg_hamburger() {
  return '<svg class="svg svg--hamburger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 18h18v-2H3V18z M3 13h18v-2H3V13z M3 6v2h18V6H3z"/></svg>';
}
