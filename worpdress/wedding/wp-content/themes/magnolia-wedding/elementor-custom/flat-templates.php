<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Widget_Wedding_Templates_Element extends Widget_Base {

	public function get_name() {
		return 'wedding-templates';
	}

	public function get_title() {
		return __( 'Wedding Templates', 'magnolia-wedding' );
	}

	public function get_icon() {
		return 'eicon-shortcode';
	}

	protected function _register_controls() {

		$this->add_control(
			'section_blog_posts',
			[
				'label' => __( 'Wedding Blog Templates Shortcodes', 'magnolia-wedding' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'page_template',
			[
				'label'   => __( 'Page Template', 'magnolia-wedding' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'base',
				'section' => 'section_blog_posts',
				'options' => [
					'contact-form'   => 'Contact Template',
					'subscribe-form' => 'Subscribe Form Template'
				],
			]
		);
	}

	protected function render( $instance = [] ) {
		$page_template = $this->get_settings( 'page_template' );

		$this->load_template( $page_template );
	}

	private function load_template( $template_name ) {
		$file = dirname( __FILE__ ) . "/partial-templates/" . $template_name . ".php";
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Wedding_Templates_Element );
?>