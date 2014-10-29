<?php
get_header();

$cat     = get_query_var('cat');
$yourcat = get_category ($cat);
$args    = array(
  'orderby'       => 'date ID',
  'order'         => 'ASC',
  'category_name' => $yourcat->slug,
);
$chapters_query = new WP_Query( $args );
if ( $chapters_query->have_posts() ) {
  echo '<div class="post--list">';
  while ( $chapters_query->have_posts() ) {
    $chapters_query->the_post();
    conduit_post( true );
  }
}

get_footer();
