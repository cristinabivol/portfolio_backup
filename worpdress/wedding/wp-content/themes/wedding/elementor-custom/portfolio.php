<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor portfolio widget.
 *
 * @since 1.0.0
 */
class Wedding_Portfolio extends Widget_Base {

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
		return 'wedding-portfolio';
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
		return __( 'MF Portfolio', 'wedding' );
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
	 */

	protected function _register_controls() {
		$this->add_control(
			'section_mf_portfolio',
			[
				'label' => __( 'MF Portfolio', 'wedding' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		//Portfolio 1
		$this->add_control(
			'portfolio_image1',
			[
				'label'   => __( 'Portfolio 1 Image', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_title1',
			[
				'label'   => __( 'Portfolio 1 Title', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_subtitle1',
			[
				'label'   => __( 'Portfolio 1 SubTitle', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_width1',
			[
				'label'   => __( 'Portfolio 1 width settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_height1',
			[
				'label'   => __( 'Portfolio 1 height settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_link1',
			[
				'label'   => __( 'Portfolio 1 Link', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		//Portfolio 2
		$this->add_control(
			'portfolio_image2',
			[
				'label'   => __( 'Portfolio 2 Image', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_title2',
			[
				'label'   => __( 'Portfolio 2 Title', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_subtitle2',
			[
				'label'   => __( 'Portfolio 2 SubTitle', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_width2',
			[
				'label'   => __( 'Portfolio 2 width settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_height2',
			[
				'label'   => __( 'Portfolio 2 height settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_link2',
			[
				'label'   => __( 'Portfolio 2 Link', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		//Portfolio 3
		$this->add_control(
			'portfolio_image3',
			[
				'label'   => __( 'Portfolio 3 Image', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_title3',
			[
				'label'   => __( 'Portfolio 3 Title', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_subtitle3',
			[
				'label'   => __( 'Portfolio 3 SubTitle', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_width3',
			[
				'label'   => __( 'Portfolio 3 width settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_height3',
			[
				'label'   => __( 'Portfolio 3 height settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_link3',
			[
				'label'   => __( 'Portfolio 3 Link', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		//Portfolio 4
		$this->add_control(
			'portfolio_image4',
			[
				'label'   => __( 'Portfolio 4 Image', 'wedding' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_title4',
			[
				'label'   => __( 'Portfolio 4 Title', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_subtitle4',
			[
				'label'   => __( 'Portfolio 4 SubTitle', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_width4',
			[
				'label'   => __( 'Portfolio 4 width settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_height4',
			[
				'label'   => __( 'Portfolio 4 height settings', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_link4',
			[
				'label'   => __( 'Portfolio 4 Link', 'wedding' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);
	}

	protected function render( $instance = [] ) {
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="portfolio-nav">
						<a href="#" data-name="all" class="active">all</a>
						<a href="#" data-name="first">first</a>
						<a href="#" data-name="second">second</a>
						<a href="#" data-name="third">third</a>
					</div>
				</div>
			</div>
			<div class="grid">
				<div class="grid-sizer"></div>
				<?php for ( $i = 1; $i <= 4; $i ++ ) {
					$title     = $this->get_settings( 'portfolio_title' . $i );
					$sub_title = $this->get_settings( 'portfolio_subtitle' . $i );
					?>

					<div style="height: <?php echo $this->get_settings( 'portfolio_height' . $i ); ?>px"
							 class="grid-item item<?php echo $i ?> <?php echo $this->get_settings( 'portfolio_width' . $i ); ?>">
						<a href="<?php echo $this->get_settings( 'portfolio_link' . $i ); ?>" class="portfolio-link"
							 data-toggle="modal">
							<div class="portfolio-item pos-r">
								<figure class="effect-oscar">
									<div
										style="background-image: url(<?php echo $this->get_settings( 'portfolio_image' . $i )["url"]; ?>)"
										class="portfolio-cell portfolio-cell1"></div>
									<figcaption>
										<div
											style="position: relative; height: 100%; display: flex; justify-content: center; align-content: center; flex-direction: column;">
											<h4><span><?php echo $title; ?></span></h4>
											<p><?php echo $sub_title; ?></p>
										</div>
									</figcaption>
								</figure>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Wedding_Portfolio );
