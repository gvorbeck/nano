<?php
get_header();

if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    
    get_template_part( 'content', get_post_format() );
  }
} else {
  echo '<p>There don\t seem to be any posts here.</p>';
}

get_footer();
