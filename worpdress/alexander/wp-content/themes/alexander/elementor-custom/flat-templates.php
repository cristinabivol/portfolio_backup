<?php

namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

class Widget_Alexander_Templates_Element extends Widget_Base
{

	public function get_name()
	{
		return 'alexander-templates';
	}

	public function get_title()
	{
		return __('Alexander Templates', 'elementor-alexander-templates-element');
	}

	public function get_icon()
	{
		return 'eicon-shortcode';
	}

	protected function _register_controls()
	{

		$this->add_control(
			'section_blog_posts',
			[
				'label' => __('Alexander Blog Templates Shortcodes', 'elementor-alexander-templates-element'),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'page_template',
			[
				'label' => __('Page Template', 'elementor-alexander-templates-element'),
				'type' => Controls_Manager::SELECT,
				'default' => 'base',
				'section' => 'section_blog_posts',
				'options' => [
					'book-form' => 'Book Form Template',
					'contact-form' => 'Contact Template',
					'testimonials' => 'Testimonials Template'
				],
			]
		);
	}

	protected function render($instance = [])
	{
		$page_template = $this->get_settings('page_template');

		$this->load_template($page_template);
	}

	private function load_template($template_name)
	{
		$file = dirname(__FILE__) . "/partial-templates/" . $template_name . ".php";
		if (file_exists($file)) {
			require $file;
		}
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new Widget_Alexander_Templates_Element);
?>