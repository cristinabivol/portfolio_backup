<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor image carousel widget.
 *
 * Elementor widget that displays a set of images in a rotating carousel or
 * slider.
 *
 * @since 1.0.0
 */
class Wedding_Header_Slider_Carousel extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve image carousel widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wedding-header-slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image carousel widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'MF Header Slider', 'magnolia-wedding' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image carousel widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery', 'jquery-slick' ];
	}

	protected function _register_controls() {
		$this->add_control(
			'section_mf_header_slider',
			[
				'label' => __( 'MF Header Slider', 'magnolia-wedding' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		//Slider 1
		$this->add_control(
			'header_slider_image1',
			[
				'label'   => __( 'Header Slider Image 1', 'magnolia-wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		//Slider 2
		$this->add_control(
			'header_slider_image2',
			[
				'label'   => __( 'Header Slider Image 2', 'magnolia-wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		//Slider 3
		$this->add_control(
			'header_slider_image3',
			[
				'label'   => __( 'Header Slider Image 3', 'magnolia-wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		//Slider 4
		$this->add_control(
			'header_slider_image4',
			[
				'label'   => __( 'Header Slider Image 4', 'magnolia-wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
	}

	protected function render( $instance = [] ) {
		$id = 1;

		$content = '<div class="header-slider slick-carousel"'
		           . ' data-slick=\'{"arrows": false, "fade": true, "infinite": true, "autoplay": true, "pauseOnHover": false, "pauseOnFocus": false, "autoplaySpeed": 5000}\'>';
		while ( true ) {
			$image = $this->get_settings( 'header_slider_image' . $id );
			if ( ! $image ) {
				break;
			}
			$content .= '<div class="item"'
			            . ' style="background-image: url(' . $image['url'] . ')">' . PHP_EOL
			            . '</div>';
			$id ++;
		}
		$content .= '</div>';

		echo $content;
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Wedding_Header_Slider_Carousel );