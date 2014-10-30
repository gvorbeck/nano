<?php
get_header();
if ( ! is_user_logged_in() ) {
  wp_login_form();
} else {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'content', get_post_format() );
  }
  comment_form();
}
get_footer();
