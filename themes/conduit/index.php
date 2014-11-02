<?php
get_header();

if ( ! is_user_logged_in() ) {
  wp_login_form();
} else {
  $word_count_query = new WP_Query( 'category_name=chapters' );
  
  // The Loop
  if ( $word_count_query->have_posts() ) {
    $master_word_count;
  	echo '<ul>';
  	while ( $word_count_query->have_posts() ) {
  		$word_count_query->the_post();
  		$master_word_count += conduit_word_count();
  		echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a> - ' . conduit_word_count() . ' words</li>';
  	}
  	echo '</ul>';
  	echo "<p>Total words: $master_word_count</p>";
  } else {
  	// no posts found
  	echo '<p>No posts found</p>';
  }
}

get_footer();
  