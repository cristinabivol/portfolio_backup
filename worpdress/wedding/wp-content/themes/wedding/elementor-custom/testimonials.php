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
class Wedding_Testimonial_Carousel extends Widget_Base {

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
		return 'wedding-testimonial-carousel';
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
		return __( 'MF Testimonial Carousel', 'wedding' );
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
			'section_mf_testimonials',
			[
				'label' => __( 'MF Overlapping Image', 'wedding' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		//Testimonial 1
		$this->add_control(
			'testimonial_image1',
			[
				'label'   => __( 'Testimonial Image 1', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_job1',
			[
				'label'   => __( 'Testimonial Job 1', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_content1',
			[
				'label'   => __( 'Testimonial Content 1', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);

		//Testimonial 2
		$this->add_control(
			'testimonial_image2',
			[
				'label'   => __( 'Testimonial Image 2', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_job2',
			[
				'label'   => __( 'Testimonial Job 2', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_content2',
			[
				'label'   => __( 'Testimonial Content 2', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);

		//Testimonial 3
		$this->add_control(
			'testimonial_image3',
			[
				'label'   => __( 'Testimonial Image 3', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_job3',
			[
				'label'   => __( 'Testimonial Job 3', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);

		$this->add_control(
			'testimonial_content3',
			[
				'label'   => __( 'Testimonial Content 3', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_testimonials'
			]
		);
	}

	protected function render( $instance = [] ) {
		$content = '<div class="testimonial-carousel slick-carousel" '
		           . 'data-slick=\'{"autoplaySpeed": 6000, "slidesToShow": 1, "dots": false, "responsive": [{"breakpoint": 800, "settings": {"slidesToShow": 1, "slidesToScroll": 1}}]}\'>';
		for ( $i = 1; $i <= 3; $i ++ ) {
			$image   = $this->get_settings( 'testimonial_image' . $i );
			$content .= '<div class="item">' . PHP_EOL
			            . '<div class="testimonial-cell">' . PHP_EOL
			            . '<img alt="' . $this->get_settings( 'testimonial_job' . $i ) . '" src="' . $image['url'] . '" >' . PHP_EOL
			            . '<p class="testimonial-commment">' . $this->get_settings( 'testimonial_content' . $i ) . '</p>' . PHP_EOL
			            . '<p class="testimonial-name"> - ' . $this->get_settings( 'testimonial_job' . $i ) . ' - </p>' . PHP_EOL
			            . '</div>' . PHP_EOL
			            . '</div>';
		}
		$content .= '</div>';
		echo $content;
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Wedding_Testimonial_Carousel );