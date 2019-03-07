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
class MilleFiori_Header_Slider_Carousel extends Widget_Base {

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
		return 'millefiori-header-slider';
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
		return __( 'MF Header Slider', 'mille-fiori' );
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
				'label' => __( 'MF Header Slider', 'mille-fiori' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		//Slider 1
		$this->add_control(
			'header_slider_image1',
			[
				'label'   => __( 'Header Slider Image 1', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);

		$this->add_control(
			'header_slider1_textalign',
			[
				'label'   => __( 'Header Slider 1 Text Align', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				],
				'section' => 'section_mf_header_slider'
			]
		);

		$this->add_control(
			'header_slider1_title',
			[
				'label'   => __( 'Header Slider 1 Title', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider1_subtitle',
			[
				'label'   => __( 'Header Slider 1 SubTitle', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider1_button',
			[
				'label'   => __( 'Header Slider 1 Button', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		//Slider 2
		$this->add_control(
			'header_slider_image2',
			[
				'label'   => __( 'Header Slider Image 2', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider2_textalign',
			[
				'label'   => __( 'Header Slider 2 Text Align', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				],
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider2_title',
			[
				'label'   => __( 'Header Slider 2 Title', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider2_subtitle',
			[
				'label'   => __( 'Header Slider 2 SubTitle', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		$this->add_control(
			'header_slider2_button',
			[
				'label'   => __( 'Header Slider 2 Button', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		//Slider 3
		$this->add_control(
			'header_slider_image3',
			[
				'label'   => __( 'Header Slider Image 3', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider3_textalign',
			[
				'label'   => __( 'Header Slider 3 Text Align', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				],
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider3_title',
			[
				'label'   => __( 'Header Slider 3 Title', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider3_subtitle',
			[
				'label'   => __( 'Header Slider 3 SubTitle', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		$this->add_control(
			'header_slider3_button',
			[
				'label'   => __( 'Header Slider 3 Button', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		//Slider 4
		$this->add_control(
			'header_slider_image4',
			[
				'label'   => __( 'Header Slider Image 4', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider4_textalign',
			[
				'label'   => __( 'Header Slider 4 Text Align', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'   => 'Left',
					'center' => 'Center',
					'right'  => 'Right',
				],
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider4_title',
			[
				'label'   => __( 'Header Slider 4 Title', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
		$this->add_control(
			'header_slider4_subtitle',
			[
				'label'   => __( 'Header Slider 4 SubTitle', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);

		$this->add_control(
			'header_slider4_button',
			[
				'label'   => __( 'Header Slider 4 Button', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_header_slider'
			]
		);
	}

	protected function render( $instance = [] ) {
		$id = 1;

		$content = '<div class="header-slider slick-carousel"'
		           . ' data-slick=\'{"pauseOnHover": false, "arrows": false, "fade": true, "infinite": true, "autoplay": true, "autoplaySpeed": 5000}\'>' . PHP_EOL;
		while ( true ) {
			$image     = $this->get_settings( 'header_slider_image' . $id );
			$title     = $this->get_settings( 'header_slider' . $id . '_title' );
			$sub_title = $this->get_settings( 'header_slider' . $id . '_subtitle' );
			$button    = $this->get_settings( 'header_slider' . $id . '_button' );

			$text_align = $this->get_settings( 'header_slider' . $id . '_textalign' );
			if ( ! $image['url'] ) {
				break;
			}

			$content .= '<div class="hero" style="background-image: url(' . $image['url'] . ')">' . PHP_EOL
			            . '<div class="slider-bg"></div>' . PHP_EOL
			            . '<div class="container">' . PHP_EOL
			            . '<div style="text-align: ' . $text_align . '" class="row hero-content">' . PHP_EOL
			            . '<div class="col">' . PHP_EOL
			            . ( $title ? '<h1 class="title" data-animation="fadeInRight" data-delay="0.5s">' . $title . '</h1>' . PHP_EOL : '' )
			            . ( $sub_title ? '<p class="sub-title" data-animation="fadeInLeft" data-delay="0.5s">' . $sub_title . '</p>' . PHP_EOL : '' )
			            . ( $button ? '<span class="btn-xl"><a href="' . $button . '" data-animation="fadeInLeft" data-delay="0.5s" class="btn">Explore</a></span>' . PHP_EOL : '' )
			            . '</div>' . PHP_EOL
			            . '</div>' . PHP_EOL
			            . '</div>' . PHP_EOL
			            . '</div>' . PHP_EOL;

			$id ++;
		}

		$content .= '</div>';
		echo $content;
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new MilleFiori_Header_Slider_Carousel );