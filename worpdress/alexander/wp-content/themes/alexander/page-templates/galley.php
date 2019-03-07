<?php
/**
 * Template Name: Gallery
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package alexander
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="card-columns">
						<div class="card" style="background-color: red; height: 430px;"></div>
						<div class="card" style="background-color: red; height: 330px;"></div>
						<div class="card" style="background-color: red; height: 330px;"></div>
						<div class="card" style="background-color: red; height: 430px;"></div>
						<div class="card" style="background-color: red; height: 380px;"></div>
						<div class="card" style="background-color: red; height: 380px;"></div>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
