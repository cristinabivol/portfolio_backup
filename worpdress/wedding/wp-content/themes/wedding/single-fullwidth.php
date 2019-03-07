<?php
/*
 * Template Name: Full Width
 * Template Post Type: post
 */
get_header();
$header_image_url = get_the_post_thumbnail_url( null, 'big-featured-image' );

?>

<!-- Blog Post Section -->
<section id="blog-post" class="visible-over">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 col-lg-9">
				<div class="big-post-image" style="background-image: url('<?php echo $header_image_url; ?>');">
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 col-lg-9">
				<!-- Start the Loop. -->
				<?php if ( have_posts() ) : while ( have_posts() ) :
				the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="post_content single_post_content">
						<h1 class="blog-title"><?php the_title(); ?></h1>
						<h5 class="blog-date"><?php echo get_the_time( 'F j, Y' ) ?> -
							<?php the_category( ', ' ); ?><!--Travel, Lifestyle--></h5>
						<?php the_content(); ?>
						<footer class="entry-footer">
							<?php
							$url       = urlencode( get_permalink() );
							$title     = str_replace( ' ', '%20', get_the_title() );
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

							$twitterURL   = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=Crunchify';
							$facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
							$whatsappURL  = 'whatsapp://send?text=' . $title;
							$linkedInURL  = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&amp;title=' . $title;
							$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $thumbnail[0] . '&amp;description=' . $title;
							?>
							<div class="social-container">
								<ul class="list-inline social-buttons">
									<li><a target="_blank" href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a>
									<li><a target="_blank" href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a>
									<li><a target="_blank" href="<?php echo $linkedInURL; ?>"><i class="fa fa-linkedin"></i></a>
									<li><a target="_blank" href="<?php echo $pinterestURL; ?>"><i class="fa fa-pinterest"></i></a>
									<li><a target="_blank" href="<?php echo $whatsappURL; ?>"><i class="fa fa-whatsapp"></i></a>
								</ul>
							</div>
						</footer>
						<?php // understrap_post_nav();
						?>
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
								<?php _e( 'Sorry, no posts matched your criteria.', 'wedding' ); ?>
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
