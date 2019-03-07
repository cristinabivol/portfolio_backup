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
class MilleFiori_Portfolio extends Widget_Base {

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
		return 'millefiori-portfolio';
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
		return __( 'MF Portfolio', 'mille-fiori' );
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
				'label' => __( 'MF Portfolio', 'mille-fiori' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		//Portfolio 1
		$this->add_control(
			'portfolio_image1',
			[
				'label'   => __( 'Portfolio 1 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover1',
			[
				'label'   => __( 'Portfolio 1 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page1',
			[
				'label'   => __( 'Portfolio 1 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type1',
			[
				'label'   => __( 'Portfolio 1 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
				'section' => 'section_mf_portfolio'
			]
		);


		//Portfolio 2
		$this->add_control(
			'portfolio_image2',
			[
				'label'   => __( 'Portfolio 2 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover2',
			[
				'label'   => __( 'Portfolio 2 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page2',
			[
				'label'   => __( 'Portfolio 2 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type2',
			[
				'label'   => __( 'Portfolio 2 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
				'section' => 'section_mf_portfolio'
			]
		);


		//Portfolio 3
		$this->add_control(
			'portfolio_image3',
			[
				'label'   => __( 'Portfolio 3 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover3',
			[
				'label'   => __( 'Portfolio 3 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page3',
			[
				'label'   => __( 'Portfolio 3 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type3',
			[
				'label'   => __( 'Portfolio 3 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
				'section' => 'section_mf_portfolio'
			]
		);


		//Portfolio 4
		$this->add_control(
			'portfolio_image4',
			[
				'label'   => __( 'Portfolio 4 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover4',
			[
				'label'   => __( 'Portfolio 4 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page4',
			[
				'label'   => __( 'Portfolio 4 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type4',
			[
				'label'   => __( 'Portfolio 4 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
				'section' => 'section_mf_portfolio'
			]
		);


		//Portfolio 5
		$this->add_control(
			'portfolio_image5',
			[
				'label'   => __( 'Portfolio 5 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover5',
			[
				'label'   => __( 'Portfolio 5 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page5',
			[
				'label'   => __( 'Portfolio 5 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type5',
			[
				'label'   => __( 'Portfolio 5 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
				'section' => 'section_mf_portfolio'
			]
		);


		//Portfolio 6
		$this->add_control(
			'portfolio_image6',
			[
				'label'   => __( 'Portfolio 6 Image', 'mille-fiori' ),
				'type'    => Controls_Manager::MEDIA,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_hover6',
			[
				'label'   => __( 'Portfolio 6 hover text', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_page6',
			[
				'label'   => __( 'Portfolio 6 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::TEXT,
				'section' => 'section_mf_portfolio'
			]
		);

		$this->add_control(
			'portfolio_type6',
			[
				'label'   => __( 'Portfolio 6 link page', 'mille-fiori' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'image',
				'options' => [
					'image' => 'Image Type',
					'text'  => 'Text Type',
				],
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

				<?php for ( $i = 1; $i <= 6; $i ++ ) {
					if ( $this->get_settings( 'portfolio_type' . $i ) == 'image' ) { ?>
						<div class="grid-item item<?php echo $i . '  ' . $this->get_settings( 'portfolio_type' . $i ); ?>">
							<a href="#portfolioModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
								<div class="portfolio-item pos-r">
									<figure class="effect-layla">
										<div
											style="background-image: url(<?php echo $this->get_settings( 'portfolio_image' . $i )["url"]; ?>)"
											class="portfolio-cell portfolio-cell1"></div>
										<figcaption>
											<h3><?php echo $this->get_settings( 'portfolio_hover' . $i ); ?></h3>
										</figcaption>
									</figure>
								</div>
							</a>
						</div>
					<?php } else {
						$page   = get_page_by_path( $this->get_settings( 'portfolio_page' . $i ) );
						$titles = $page->post_title;
						$date   = strtotime( $page->post_date ); ?>
						<div class="grid-item item<?php echo $i; ?>">
							<a href="#portfolioModal<?php echo $i; ?>" class="portfolio-link" data-toggle="modal">
								<div class="portfolio-cell portfolio-cell<?php echo $i; ?>">
									<div class="portfolio-info">
										<h6>Celebrations</h6>
										<h3><?php echo $titles; ?></h3>
										<p><?php echo implode( ' ', array_slice( str_word_count( $page->post_content, 1 ), 1, 20 ) ); ?></p>
										<div class="portfolio-separator"></div>
										<p><?php echo date( "M Y", $date ); ?></p>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>


		<?php for ( $i = 1; $i <= 6; $i ++ ) {
			$page   = get_page_by_path( $this->get_settings( 'portfolio_page' . $i ) );
			$titles = $page->post_title;
			//$images = get_the_post_thumbnail_url( $page, 'big-featured-image' ); ?>
			<div id="portfolioModal<?php echo $i; ?>" class="modal">
				<div class="modal-content">
					<div class="close-modal" data-dismiss="modal">
						<div class="lr">
							<div class="rl"></div>
						</div>
					</div>
					<div class="container">
						<div class="modal-body">
							<h1 class="text-center modal-title"><?php echo $titles; ?></h1>
							<?php echo \Elementor\Plugin::$instance->frontend->get_builder_content( $page->ID ); ?>
							<div class="text-center btn-xl">
								<a href="#" class="btn close-button">Close</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new MilleFiori_Portfolio );
