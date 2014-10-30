<?php
get_header();
if ( ! is_user_logged_in() ) {
  wp_login_form();
} else {
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      get_template_part( 'content', get_post_format() );
    }
  } else {
    echo 'No posts found.';
  }
}
get_footer();
