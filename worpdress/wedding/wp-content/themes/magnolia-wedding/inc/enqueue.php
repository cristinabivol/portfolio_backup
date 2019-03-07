<?php

if ( ! function_exists( 'underscore_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function custom_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();

		wp_enqueue_style( 'grid', get_template_directory_uri() . '/grid.css' );
		wp_enqueue_script( 'wedding-viewportchecker', get_template_directory_uri() . '/js/vendor/jquery.viewportchecker.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'wedding-imageloaded', get_template_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'wedding-masonry', get_template_directory_uri() . '/js/vendor/masonry.pkgd.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'wedding-bootstrap-validation', get_template_directory_uri() . '/js/vendor/jqBootstrapValidation.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'wedding-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
	}
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );