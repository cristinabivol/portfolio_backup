<?php

namespace Elementor;

if (!defined('ABSPATH')) {
	exit;
} // Exit if accessed directly

class Widget_Alexander_Blog_Element extends Widget_Base
{

	public function get_name()
	{
		return 'alexander-blog';
	}

	public function get_title()
	{
		return __('Alexander Blog', 'elementor-alexander-blog-element');
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
				'label' => __('Alexander Blog Posts', 'elementor-alexander-blog-element'),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __('Posts per page', 'elementor-alexander-blog-element'),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'section' => 'section_blog_posts',
				'options' => [
					3 => '3',
					4 => '4',
					5 => '5',
					6 => '6',
					7 => '7',
					8 => '8',
					9 => '9',
					10 => '10',
				]
			]
		);

		$this->add_control(
			'page_template',
			[
				'label' => __('Page Template', 'elementor-alexander-blog-element'),
				'type' => Controls_Manager::SELECT,
				'default' => 'base',
				'section' => 'section_blog_posts',
				'options' => [
					'base' => 'Base Layout',
					'list' => 'List Layout',
				],
			]
		);

	}

	protected function render($instance = [])
	{
		$page_template = $this->get_settings('page_template');
		$post_per_page = $this->get_settings('posts_per_page');
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) { // if is static front page
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $post_per_page,
			'paged' => $paged,
		);
		$grid_query = new \WP_Query($args);
		$count = 0;
		$pagination_output = '';
		?>

		<div id="blog" class="content-area list-container">
			<div class="container site-main">
				<div class="row">
					<?php
					if ($grid_query->have_posts()) :
						global $count;
						/* Start the Loop */
						while ($grid_query->have_posts()) : $grid_query->the_post();  // Start of posts loop found posts
							$count++;
							$this->load_template($page_template);
						endwhile; // End of posts loop found posts

						$big = 999999999; // need an unlikely integer
						$totalpages = $grid_query->max_num_pages;
						$current = max(1, $paged);
						$paginate_args = array(
							'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
							'format' => '?paged=%#%',
							'current' => $current,
							'total' => $totalpages,
							'show_all' => false,
							'end_size' => 1,
							'mid_size' => $post_per_page,
							'prev_next' => true,
							'prev_text' => esc_html__('« Previous'),
							'next_text' => esc_html__('Next »'),
							'type' => 'plain',
							'add_args' => false,
						);

						$pagination = paginate_links($paginate_args);
						$pagination_output = '<div><nav class="pagination wp-caption blog-navigation">'
							. $pagination . '</nav></div>';
					else :   //if no posts found
						// $templates->get_template_part( 'content', 'none' );
					endif; //end of post loop ?>
				</div><!-- #main -->
				<?php if ($pagination_output) echo $pagination_output; ?>
			</div><!-- #primary -->
		</div>
		<?php
		wp_reset_postdata();
	}

	private function load_template($template_name)
	{
		$file = dirname(__FILE__) . "/templates/" . $template_name . ".php";
		if (file_exists($file)) {
			require $file;
		}
	}

	protected function content_template()
	{
	}

	public function render_plain_content($instance = [])
	{
	}

}

Plugin::instance()->widgets_manager->register_widget_type(new Widget_Alexander_Blog_Element);
?>