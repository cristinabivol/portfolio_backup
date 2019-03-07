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
	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,500,600,700%7CPlayfair+Display:400,400i,700,700i"
				rel="stylesheet">
	<?php wp_head(); ?>
	<style>
		.elementor-widget-button a.elementor-button,
		.elementor-widget-button .elementor-button,
		.btn-xl a, .elementor-button a, button.btn-xl,
		#commentform input.submit a,
		#subscribe-form .btn, #contact .contact-btn,
		.woocommerce .product .cart .button {
			background-color: <?php echo theme_get_option( 'button_color' ) ?>;
			border: 2px solid <?php echo theme_get_option( 'button_color' ) ?>;
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
if ( theme_get_option( 'millefiori_page_animation' ) == 'on' ): ?>
	<div id="loader">
	</div>
	<script>
		jQuery(window).load(function () {
			jQuery("#loader").fadeOut("slow");
		});
	</script>
<?php endif; ?>

<header <?php if(class_exists( 'WooCommerce' ) && is_woocommerce()) echo 'class="shop-header"';?>>
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
						<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
							$count = WC()->cart->cart_contents_count;
							?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
							if ( $count > 0 ) {
								?>
								<span class="cart-contents-count"><?php echo esc_html( $count ); ?> item<?php if ($count > 1) echo 's';?></span>
								<?php
							}
							?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<?php if (class_exists( 'WooCommerce' ) && is_woocommerce()): ?>
		<div class="text-container">
			<div class="container">
				<div class="intro-text">
					<h1 class="intro-heading">Shop</h1>
					<div class="intro-separator"></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</header>

