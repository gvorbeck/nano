<?php
get_header();

if ( ! is_user_logged_in() ) {
  wp_login_form();
} else {
  echo '<p>ur logged in, dawg</p>';
}

get_footer();
  