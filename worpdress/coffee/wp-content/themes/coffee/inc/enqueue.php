<?php

if ( ! function_exists( 'underscore_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function millefiori_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();

		wp_enqueue_style( 'grid', get_template_directory_uri() . '/grid.css' );
		wp_enqueue_script( 'mille-fiori-viewport', get_template_directory_uri() . '/js/vendor/jquery.viewportchecker.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'mille-fiori-imageloaded', get_template_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'mille-fiori-masonry', get_template_directory_uri() . '/js/vendor/masonry.pkgd.min.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'mille-fiori-bootstrap-validation', get_template_directory_uri() . '/js/vendor/jqBootstrapValidation.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'mille-fiori-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		if ( theme_get_option( 'onepage_menu_active' ) == 'on' ) {
			wp_enqueue_script( 'mille-fiori-onepage', get_template_directory_uri() . '/js/onepage.js', array( 'jquery' ), $the_theme->get( 'Version' ), true );
		}

	}
}

add_action( 'wp_enqueue_scripts', 'millefiori_scripts' );
