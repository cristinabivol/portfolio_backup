<?php

class ElementorWeddingThemeCustomElements {

	private static $instance = null;

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function init() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
	}

	public function widgets_registered() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
			//Include custom blog element
			$widget_file = get_template_directory() . '/elementor-custom/blog-element.php';
			if ( $widget_file && is_readable( $widget_file ) ) {
				require_once $widget_file;
			}

			//Include header slider
			$widget_file = get_template_directory() . '/elementor-custom/header-slider.php';
			if ( $widget_file && is_readable( $widget_file ) ) {
				require_once $widget_file;
			}

			//Include custom blog element
			$widget_file = get_template_directory() . '/elementor-custom/flat-templates.php';
			if ( $widget_file && is_readable( $widget_file ) ) {
				require_once $widget_file;
			}

			//Include custom blog element
			$widget_file = get_template_directory() . '/elementor-custom/testimonials.php';
			if ( $widget_file && is_readable( $widget_file ) ) {
				require_once $widget_file;
			}

			//Include portfolio
			$widget_file = get_template_directory() . '/elementor-custom/portfolio.php';
			if ( $widget_file && is_readable( $widget_file ) ) {
				require_once $widget_file;
			}
		}
	}

}

ElementorWeddingThemeCustomElements::get_instance()->init();