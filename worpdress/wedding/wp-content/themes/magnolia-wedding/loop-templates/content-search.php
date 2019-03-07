<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package wedding
 */

//$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
?>
<div class="blog-cell" <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h6 class="blog-date"><?php echo get_the_date(); ?></h6>
	<h2 class="blog-title special-title"><?php echo get_the_title(); ?></h2>
	<div>
		<h4 class="blog-by">
			<?php echo 'by ' . get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) ?>
		</h4>
		<div class="blog-text"><?php the_excerpt(); ?></div>
	</div>
</div>
