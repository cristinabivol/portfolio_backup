<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */
include_font_awesome();
get_header( 'small' );

?>

<div class="wrapper" id="error-404-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row justify-content-center">

			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
									'mille-fiori' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
									'mille-fiori' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
