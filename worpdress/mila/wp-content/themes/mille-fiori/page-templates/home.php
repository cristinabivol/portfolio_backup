<?php
/**
 * Template Name: Home Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package mille-fiori
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main homepage">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'minimal' );

				// If comments are open or we have at least one comment, load up the comment template.
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>