<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package alexander
 */
?>
<!-- Footer -->
<?php if (is_active_sidebar('customfooter')) : ?>
	<?php get_sidebar('customfooter'); ?>
<?php else : ?>
	<footer class="footer">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-3 my-auto hide-mobile">
					<img class="d-block img-fluid mx-auto" src="<?php echo theme_get_option('theme_footer_logo'); ?>"
							 alt="logo">
				</div>
				<div class="col-md-5 col-lg-3 contact-us">
					<h5 class="footer-title special-title no-margin">Contact us</h5>
					<div class="footer-separator"></div>
					<ul class="list-unstyled address">
						<li>
							<p><i class="fa fa-globe" aria-hidden="true"></i>
								<?php echo theme_get_option('theme_footer_address', 'Calle Esmeralda 32, Madrid, Spain'); ?>
							</p>
						</li>
						<li>
							<p><i class="fa fa-phone" aria-hidden="true"></i>
								<?php echo theme_get_option('theme_footer_phone', '+475 4675 0987 1324'); ?>
							</p>
						</li>
						<li>
							<p><i class="fa fa-envelope" aria-hidden="true"></i>
								<?php echo theme_get_option('theme_footer_email', 'alexander@alexander.com'); ?>
							</p>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-lg-2">
					<h5 class="footer-title special-title">Follow us</h5>
					<div class="footer-separator"></div>
					<ul class="social-buttons">
						<li class=""><a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li class=""><a href="#"><i class="fa fa-youtube"></i></a>
						</li>
						<li class=""><a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li class=""><a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li class=""><a href="#"><i class="fa fa-linkedin"></i></a>
						</li>
						<li class=""><a href="#"><i class="fa fa-linkedin"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-lg-3">
					<h5 class="footer-title special-title">Subscribe</h5>
					<div class="footer-separator"></div>
					<div id="mc_embed_signup">
						<p>Subscribe for a weekly newsletter</p>
						<form id="subscribe-form" class="needs-validation" novalidate>
							<div class="input-group form-group">
								<input type="email" name="email" class="form-control" placeholder="Email address..." required>
								<div class="invalid-feedback">
									Please provide a valid email.
								</div>
								<span class="input-group-btn white-hover">
                  <button type="submit" name="subscribe" class="btn btn-xl smaller common-button">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </button>
                </span>
								<div id="subscribe-success"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>