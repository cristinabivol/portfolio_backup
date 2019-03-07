<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package void
 */
global $count;
$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );

if ( $count % 2 == 0 ) { ?>
	<div class="container grid-blog">
		<div class="row pos-r">
			<div class="col-md-6 col-lg-6 blog-image-cell">
				<div class="blog-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			</div>
			<div class="col-md-6 col-lg-6 blog-info-cell">
				<div>
					<h6 class="blog-date"><?php echo get_the_date() ?></h6>
					<h2 class="blog-title special-title"><?php echo get_the_title(); ?></h2>
					<div class="blog-text">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="container grid-blog">
		<div class="row pos-r">
			<div class="col-md-6 col-lg-6 blog-info-cell order2-mobile">
				<div>
					<h6 class="blog-date"><?php echo get_the_date() ?></h6>
					<h2 class="blog-title special-title"><?php echo get_the_title(); ?></h2>
					<div class="blog-text">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 blog-image-cell order1-mobile">
				<div class="blog-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			</div>
		</div>
	</div>
<?php }
