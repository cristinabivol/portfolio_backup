<?php
/*
 * Template Name: Blog Post Full
 * Template Post Type: post, page, product
 */
get_header( 'small-fullwidth' );
?>

<!-- Blog Post Section -->
<section id="blog-post" class="visible-over">
	<div class="container">
		<div class="row pos-r justify-content-center">
			<div class="col-12 col-md-9 col-lg-9">
				<!-- Start the Loop. -->
          <?php if ( have_posts() ) : while ( have_posts() ) :
          the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="post_content single_post_content">

						<div class="full-width-post-image"
							style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'big-featured-image'); ?>');"></div>

						<h5 class="blog-post-details"><?php echo get_the_time( 'F j, Y' ) ?> -
                <?php the_category( ', ' ); ?><!--Travel, Lifestyle--></h5>
						<h1 class="blog-post-title"><?php the_title(); ?></h1>
              <?php the_content(); ?>
              <?php echo get_post_social_buttons() ?>
              <?php understrap_post_nav(); ?>
						<div class="horisontal-sidebar">
                <?php get_sidebar( 'horizontal' ); ?>
						</div>
              <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                  comments_template();
              endif;
              ?>
					</div>
					<!--End Post-->
            <?php
            endwhile;
            else:
                ?>
							<div class="blogs_page_container">
								<p>
                    <?php _e( 'Sorry, no posts matched your criteria.', 'mille-fiori' ); ?>
								</p>
							</div>
            <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="clear"></div>

<?php get_footer(); ?>
