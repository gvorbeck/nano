<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <?php
		if ( is_single() ) {
			the_title( '<h1>', '</h1>' );
		} else {
		  the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		}
    echo '<time datetime="' . date( 'Y-m-d H:i', strtotime( get_the_date() ) ) . '">' . get_the_date() . '</time>';
		?>
  </header>
  <div class="post--content">
    <?php
    if ( ! is_single() ) {
		  the_excerpt();
		} else {
  		the_content();
		}
		?>
  </div>
  <?php
  if ( comments_open() || get_comments_number() ) {
		comments_template();
  }
  ?>
</article>
