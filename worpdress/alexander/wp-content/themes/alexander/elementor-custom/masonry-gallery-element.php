<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Widget_Masonry_Gallery_Element extends Widget_Base
{

	public function get_name()
	{
		return 'masonry-gallery';
	}

	public function get_title()
	{
		return __('Masonry Gallery', 'elementor-masonry-gallery');
	}

	public function get_icon()
	{
		return 'eicon-gallery-grid';
	}

	protected function _register_controls()
	{

		$this->add_control(
			'section_blog_posts',
			[
				'label' => __('Masonry Gallery', 'elementor-masonry-gallery'),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => __('Add Images', 'plugin-domain'),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'section' => 'section_blog_posts',
			]
		);

		$this->add_control(
			'columns_per_page',
			[
				'label' => __('Number of Columns', 'elementor-masonry-gallery'),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'section' => 'section_blog_posts',
				'options' => [
					3 => __('3', 'elementor-masonry-gallery'),
					4 => __('4', 'elementor-masonry-gallery'),
					5 => __('5', 'elementor-masonry-gallery'),
				]
			]
		);

	}

	protected function render($instance = [])
	{

		$images = $this->get_settings('gallery');
		$columnd_count = (int)$this->get_settings('columns_per_page');

		$content = '<div style="column-count: ' . $columnd_count . '" class="card-columns masonry-gallery" id="5a119f2aa">';
		foreach ($images as $image) {
			$content .= '<a class="card fade-animate" href="' . $image["url"] . '" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="5a119f2aa">'
				. '<div class="card-image" style="background-image: url(&quot;' . $image["url"] . '&quot;);"><div class="gallery-bg"></div></div>'
				. '</a>';
		}
		$content .= '</div>';
		echo $content;
	}

	protected function content_template()
	{
	}

	public function render_plain_content($instance = [])
	{
	}

}

Plugin::instance()->widgets_manager->register_widget_type(new Widget_Masonry_Gallery_Element);
?>