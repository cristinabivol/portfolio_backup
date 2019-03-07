<?php

get_header();
?>

<!-- Blog Post Section -->
<section id="blog" class="visible-over">
	<div class="container">
		<div class="row pos-r">
			<div class="col-12 col-md-8 col-lg-8">
				<!-- Start the Loop. -->
				<?php if ( have_posts() ) : while ( have_posts() ) :
				the_post(); ?>
				<div>
					<div class="blog_content">
						<?php the_content(); ?>
					</div>
					<!--End Post-->
					<?php
					endwhile;
					else:
						?>
						<div class="blog_content">
							<p>
								<?php _e( 'Sorry, no posts matched your criteria.', 'magnolia-wedding' ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- Do the right sidebar check -->
			<?php get_sidebar( 'right' ); ?>
		</div>
	</div>
</section>
<div class="clear"></div>
<?php get_footer(); ?>
