<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wedding
 */
/*
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();

//				*
//				 * Include the Post-Type-specific template for the content.
//				 * If you want to override this in a child theme, then include a file
//				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
//				 *
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer(); */


get_header();
?>

<!-- Blog Post Section -->
<section id="archives" class="list-container">
	<div class="container">
		<div class="row pos-r">
			<div class="col-12 col-md-8 col-lg-8">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
				<!-- Start the Loop. -->
				<?php if ( have_posts() ) : while ( have_posts() ) :
					the_post();
					get_template_part( 'loop-templates/content', get_post_format() );
				endwhile;
				else:
					?>
					<div class="blog_content">
						<p>
							<?php _e( 'Sorry, no posts matched your criteria.', 'wedding' ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<?php get_sidebar( 'right' ); ?>
		</div>
	</div>
</section>
<div class="clear"></div>
<?php get_footer(); ?>

