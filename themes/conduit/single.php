<?php
get_header();

conduit_post();
echo '<ol class="comment--list">';
    wp_list_comments( array( 'style' => 'ol' ) );
echo '</ol>';
$comments = get_comments();
var_dump($comments);
comment_form();

get_footer();
