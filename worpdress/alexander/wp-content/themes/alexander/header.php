<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package alexander
 */

$container = get_theme_mod('understrap_container_type');
?>
	<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700%7CPlayfair+Display:400,400i,700,700i"
					rel="stylesheet">

		<style>
			/* base background color */
			.footer, .footer a, footer .form-control, footer .form-control:focus {
				color: <?php echo theme_get_option('footer_color', '#cfccd4'); ?> !important;
				background-color: <?php echo theme_get_option('footer_background_color', '#cfccd4'); ?>;
			}

			footer .form-control::-webkit-input-placeholder {
				color: <?php echo theme_get_option('footer_color', '#cfccd4'); ?> !important;
			}

			footer .form-control::-moz-placeholder {
				color: <?php echo theme_get_option('footer_color', '#cfccd4'); ?> !important;
			}

			footer .form-control:-ms-input-placeholder {
				color: <?php echo theme_get_option('footer_color', '#cfccd4'); ?> !important;
			}

			.footer-separator, .sidebar-separator {
				border-color: <?php echo theme_get_option('pages_color_scheme', '#e5c07c'); ?>;
			}

			.common-button {
				background-color: <?php echo theme_get_option('pages_color_scheme', '#e5c07c'); ?>;
			}

			.navbar-light .navbar-nav .nav-link {
				color: <?php echo theme_get_option('pages_nav_color', '#fff'); ?> !important;
			}
                        .comments-area .comment-reply-title, .comments-area .comments-title {
				margin-top:3rem;
			}
		</style>

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container relative">
			<?php the_custom_logo(); ?>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
							data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
							aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'navbarResponsive',
					'menu_id' => 'main-menu',
					'menu_class' => 'navbar-nav ml-auto',
					'fallback_cb' => '',
					'walker' => new understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
		</div>
	</nav>
	<!-- Page Header -->
<?php
$template = get_page_template();
if (strpos($template, 'withoutheader') !== false) {
} elseif (strpos($template, 'withslider') !== false) { ?>
	<header class="masthead" style="height: <?php echo theme_get_option('page_header_slider_height', '83') ?>%;">
		<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item item active"
						 style="background-image: url('<?php echo theme_get_option('theme_slide1_image', '') ?>')"></div>
				<div class="carousel-item item"
						 style="background-image: url('<?php echo theme_get_option('theme_slide2_image', '') ?>')"></div>
				<div class="carousel-item item"
						 style="background-image: url('<?php echo theme_get_option('theme_slide3_image', '') ?>')"></div>
				<div class="carousel-item item"
						 style="background-image: url('<?php echo theme_get_option('theme_slide4_image', '') ?>')"></div>
			</div>

		</div>
		<div class="text-container">
			<div class="container">
				<div class="intro-text-container">
					<div class="intro-text">
						<div
							class="intro-lead-in special-title"><?php echo theme_get_option('theme_slider_text1', 'Welcome to') ?></div>
						<div
							class="intro-heading special-title"><?php echo theme_get_option('theme_slider_text2', 'Alexander') ?></div>
						<div class="intro-subheading"><?php echo theme_get_option('theme_slider_text3', 'Madrid') ?></div>
					</div>
				</div>
			</div>
		</div>
	</header>
<?php } else {
	$data = get_the_archive_title();
	if ($data && strpos($data, ":")) {
		$title = substr($data, strpos($data, ":") + 2);
	} elseif (is_search()) {
		$title = 'Search';
	} else {
		$title = get_the_title();
	}
	?>
	<header class="ordinary"
					style="background-image: url('<?php echo theme_get_option('small_header_bg_image', ''); ?>');
						height: <?php echo theme_get_option('page_header_height', '40') ?>%;">
		<div class="text-container">
			<div class="container">
				<div class="intro-text-container">
					<div class="intro-text">
						<div class="intro-heading special-title"><?php echo $title; ?></div>
					</div>
				</div>
			</div>
		</div>
	</header>
<?php } ?>
