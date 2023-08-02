<?php

/**
 * The template is used for displaying a static post
 *
 */
get_header(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title( '<h1>', '</h1>THIS IS SINGLE PHP' );
        the_content();
    endwhile;
else:
    _e( 'Sorry, no pages matched your criteria.', 'textdomain' );
endif;
?>