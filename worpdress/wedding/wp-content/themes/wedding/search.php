<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wedding
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="list-container">
				<div class="container">
					<div class="row pos-r">
						<div class="col-12 col-md-8 col-lg-8">
							<?php if ( have_posts() ) : ?>

								<div class="page-header">
									<h1 class="page-title">
										<?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search results for: %s', 'wedding' ), '<span>' . get_search_query() . '</span>' );
										?>
									</h1>
								</div><!-- .page-header -->

								<?php
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									get_template_part( 'loop-templates/content', 'search' );
								endwhile;
							//the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
						<?php get_sidebar( 'right' ); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar( 'right' );
get_footer();
