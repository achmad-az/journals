<?php
/**
 * The template for displaying all single posts
 *
 */

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', get_post_type() );

	//the_post_navigation();

endwhile; // End of the loop.
