<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mille-fiori
 */
?>

<footer class="footer-block visible-over">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<img class="d-block img-fluid mx-auto" src="<?php echo theme_get_option( 'millefiori_footer_logo' ); ?>"
						 alt="logo">
			</div>
			<div class="col-12 col-lg-3 offset-lg-1 address">
				<p><i class="fa fa-globe fa-1x" aria-hidden="true"></i>
					<?php echo theme_get_option( 'millefiori_footer_address', '121 Sunrise Blvd, 32, Melbourne, Australia' ); ?>
				</p>
				<p><i class="fa fa-phone" aria-hidden="true"></i>
					<?php echo theme_get_option( 'onapage_footer_phone', '+687 234 789 123' ); ?></p>
				<p><i class="fa fa-envelope" aria-hidden="true"></i>
					<?php echo theme_get_option( 'millefiori_footer_email', 'millefiori@gmail.com' ); ?></p>
			</div>
			<div class="col-12 col-lg-3 offset-lg-1">
				<ul class="list-inline social-buttons">
					<li>
						<a target="_blank" href="<?php echo theme_get_option( 'millefiori_footer_social1', '#' ); ?>">
							<i class="fa <?php echo theme_get_option( 'millefiori_footer_social1thumb', 'fa-twitter' ); ?>"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo theme_get_option( 'millefiori_footer_social2', '#' ); ?>">
							<i class="fa <?php echo theme_get_option( 'millefiori_footer_social2thumb', 'fa-youtube' ); ?>"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo theme_get_option( 'millefiori_footer_social3', '#' ); ?>">
							<i class="fa <?php echo theme_get_option( 'millefiori_footer_social3thumb', 'fa-facebook' ); ?>"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo theme_get_option( 'millefiori_footer_social4', '#' ); ?>">
							<i class="fa <?php echo theme_get_option( 'millefiori_footer_social4thumb', 'fa-instagram' ); ?>"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo theme_get_option( 'millefiori_footer_social5', '#' ); ?>">
							<i class="fa <?php echo theme_get_option( 'millefiori_footer_social5thumb', 'fa-linkedin' ); ?>"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
