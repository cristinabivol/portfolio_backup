<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Widget_Overlapping_Image_Element extends Widget_Base {

	public function get_name() {
		return 'overlapping-image';
	}

	public function get_title() {
		return __( 'MF Overlapping Image', 'mille-fiori' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function render_plain_content( $instance = [] ) {
	}

	protected function _register_controls() {
		$this->add_control(
			'section_overlapping-image',
			[
				'label' => __( 'MF Overlapping Image', 'mille-fiori' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'section_image1',
			[
				'label'   => __( 'Image 1', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_overlapping-image'
			]
		);

		$this->add_control(
			'section_image2',
			[
				'label'   => __( 'Image 2', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_overlapping-image'
			]
		);
	}

	protected function render( $instance = [] ) {

		$image1 = $this->get_settings( 'section_image1' );
		$image2 = $this->get_settings( 'section_image2' );

		$content = '<div class="service-image-container">'
		           . '<div class="service-image1" style="background-image: url(' . $image1['url'] . ')"></div>'
		           . '<div class="service-image2" style="background-image: url(' . $image2['url'] . ')"></div>'
		           . '</div>';

		echo $content;
	}

	protected function content_template() {
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Overlapping_Image_Element );