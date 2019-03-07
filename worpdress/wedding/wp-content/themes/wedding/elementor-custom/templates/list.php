<?php
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
?>
<div class="blog-cell list-blog">
	<h1 class="blog-title special-title"><?php echo get_the_title(); ?></h1>
	<h6 class="blog-date"><?php echo get_the_date() ?></h6>
	<div class="col blog-image-cell">
		<div class="blog-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
	</div>
	<div>
		<h4
			class="blog-by"><?php echo 'by ' . get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) ?></h4>
		<div class="blog-text">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>