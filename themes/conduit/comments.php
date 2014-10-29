<footer>
  <?php if ( have_comments() ) { ?>
    <div class="post--comment-container">
      <h2 class="comments-title">
    		<?php
    			printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentyfourteen' ),
    				number_format_i18n( get_comments_number() ), get_the_title() );
    		?>
    	</h2>
    	<ol class="post--comment-list">
    		<?php
    			wp_list_comments( array(
    				'style'      => 'ol',
    				'short_ping' => true,
    				'avatar_size'=> 96,
    			) );
    		?>
    	</ol>
    </div>
  <?php } ?>
</footer>