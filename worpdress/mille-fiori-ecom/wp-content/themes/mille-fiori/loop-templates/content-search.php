<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h5 class="blog-post-details"><?php echo get_the_time( 'F j, Y' ) ?> -
		<?php the_category( ', ' ); ?><!--Travel, Lifestyle--></h5>
	<h1 class="blog-post-title"><?php the_title(); ?></h1>

	<div class="entry-content">

		<?php
		the_excerpt();
		?>
		<div class="read-more-button post-list-link btn-xl">
			<a href="<?php the_permalink() ?>" class="page-scroll btn btn-xl">Read more</a>
		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'mille-fiori' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
