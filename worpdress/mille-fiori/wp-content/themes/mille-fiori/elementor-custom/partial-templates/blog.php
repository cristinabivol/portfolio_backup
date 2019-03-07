<div class="blog-carousel slick-carousel" data-slick='{"autoplaySpeed": 4000, "slidesToShow": 1, "slidesToScroll": 1, "dots": true}'>
	<?php
	$post_count   = 4;
	$recent_args  = [
		"posts_per_page" => $post_count,
		"orderby"        => "date",
		"order"          => "DESC"
	];
	$recent_posts = new WP_Query( $recent_args );
	$index        = 1;
	if ( $recent_posts->have_posts() ) :
		while ( $recent_posts->have_posts() ) :
			$recent_posts->the_post(); ?>
			<div class="item">
				<div class="blog-cell container">
					<div class="row">
						<?php 	if ($index%2==0) { ?>
							<div class="col">
								<div class="blog-image-cell">
									<?php the_post_thumbnail('middle-featured-image'); ?>
								</div>
							</div>
							<div class="col" style="display: flex; align-items:center;">
								<div class="blog-element leftalign">
									<h1 class="blog-title" data-animation="fadeInUp" data-delay="0.5s"><?php the_title() ?></h1>
									<div class="blog-content">
										<h5 class="blog-date"><?php echo get_the_date() ?></h5>
										<?php the_excerpt() ?>
										<div class="blog-separator"></div>
										<div class="btn-xl">
											<a href="<?php the_permalink() ?>" class="page-scroll">Read more</a>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="col" style="display: flex; align-items:center;">
								<div class="blog-element">
									<h1 class="blog-title" data-animation="fadeInUp" data-delay="0.5s"><?php the_title() ?></h1>
									<div class="blog-content">
										<h5 class="blog-date"><?php echo get_the_date() ?></h5>
										<?php the_excerpt() ?>
										<div class="blog-separator"></div>
										<div class="btn-xl">
											<a href="<?php the_permalink() ?>" class="page-scroll">Read more</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="blog-image-cell">
									<?php the_post_thumbnail('middle-featured-image'); ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
			$index++;
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</div>