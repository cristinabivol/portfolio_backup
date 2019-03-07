<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mille-fiori
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,500,600,700%7CPlayfair+Display:400,400i,700,700i" rel="stylesheet">
	<?php wp_head(); ?>
	<style>
		.elementor-widget-button a.elementor-button,
		.elementor-widget-button .elementor-button,
		.btn-xl a, .elementor-button a, button.btn-xl,
		#commentform input.submit a,
		#subscribe-form .btn, #contact .contact-btn,
		.woocommerce .product .cart .button,
		.read-more-button>.btn,
		.form-submit>.submit {
			background-color: <?php echo theme_get_option( 'button_color' ) ?>;
			border: 1px solid <?php echo theme_get_option( 'button_color' ) ?> !important;
		}
		.btn-xl a:after, button.btn-xl:after,
		.woocommerce .product .cart .button:after {
			background: <?php echo theme_get_option( 'button_hover_color' ) ?>;
			opacity: .3;
		}
	</style>
</head>
<body id="page-top" <?php body_class(); ?>>
<?php
if ( theme_get_option( 'millefiori_page_animation' ) == 'on' ) { ?>
	<div id="loader">
	</div>
	<script>
		jQuery(window).load(function () {
			jQuery("#loader").fadeOut("slow");
		});
	</script>
	<?php
}
if (is_single()) {
	$header_image_url = get_the_post_thumbnail_url(null, 'big-featured-image');
} else {
	$header_image_url = theme_get_option( 'small_header_bg_image', '' );
}
?>
<header class="small-header single-header">
	<nav id="mainNav" class="navbar navbar-expand-md navbar-light fixed-top affix-top">
		<div class="container">
			<div class="row">
				<div class="col">
					<button class="navbar-toggler navbar-toggler-right" type="button">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="nav-container">
						<div class="logo-section">
							<a class="navbar-brand page-scroll" href="/">
								<img class="img-responsive img-centered"
										 src="<?php echo theme_get_option( 'millefiori_header_logo', get_template_directory_uri() . '/img/logo1.png' ); ?>"
										 alt="logo">
							</a>
						</div>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'menu-1',
								'container_class' => 'collapse navbar-collapse',
								'menu_class'      => 'navbar-nav',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div>
				</div>
			</div>
		</div>
	</nav>

		<div class="<?php echo is_single() ? 'container' : ''; ?> small-header-image"
				 <?php if ($header_image_url): ?>style="background-image: url('<?php echo $header_image_url; ?>');"<?php endif; ?>>
		</div>

	<?php $data = get_the_archive_title();
	if ( $data && strpos( $data, ":" ) ) {
		$title = substr( $data, strpos( $data, ":" ) + 2 );
	} elseif ( is_single() ) {
		$title = null;
	} elseif (is_search()) {
		$title = 'Search';
	} elseif (is_404()) {
		$title = '404';
	}
	if ( $title ): ?>
		<div class="text-container">
			<div class="container">
				<div class="intro-text">
					<h1 class="intro-heading"><?php echo $title; ?></h1>
					<div class="intro-separator"></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</header>
