<?php

function related_posts() {
	register_widget( 'RelatedPosts' );
}

add_action( 'widgets_init', 'related_posts' );

class RelatedPosts extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname'   => 'related_posts',
			'description' => 'Display related posts'
		);

		parent::__construct( 'related_posts', 'Related Posts', $widget_details );

	}

	public function widget( $args, $instance ) {

		global $post;
		$orig_post  = $post;
		$categories = get_the_category( $post->ID );
		if ( $categories ) {
			$category_ids = array();
			foreach ( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;
			}
			$args     = array(
				'category__in'     => $category_ids,
				'post__not_in'     => array( $post->ID ),
				'posts_per_page'   => 3, // Number of related posts that will be shown.
				'caller_get_posts' => 1
			);
			$my_query = new wp_query( $args );
			if ( $my_query->have_posts() ) {
				echo '<div class="related-posts"><h5 class="related-title">Related posts</h5><div class="related-posts-separator"></div><div class="container"><div class="row">';
				while ( $my_query->have_posts() ) {
					$my_query->the_post(); ?>
					<div class="col-md-4">
						<div class="relatedthumb">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail(); ?>
								<div class="related-name"><?php the_title() ?></div>
							</a>
						</div>
					</div>
					<?php
				}
				echo '</div></div></div>';
				?>
			<?php }
		}
		$post = $orig_post;
		wp_reset_query();
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	public function form( $instance ) {

	}
}


function recent_posts_with_images() {
	register_widget( 'RecentPostWithImages' );
}

add_action( 'widgets_init', 'recent_posts_with_images' );

class RecentPostWithImages extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname'   => 'recent_post_with_images',
			'description' => 'Display Recent posts with mages'
		);

		parent::__construct( 'recent_post_with_images', 'Recent Posts With Images', $widget_details );

	}

	public function widget( $args, $instance ) {

		$current_id   = get_the_ID();
		$recent_posts = wp_get_recent_posts();
		if ( count( $recent_posts ) >= 3 ) {
			echo '<div class="sidebar-section">';
			echo '<h4 class="sidebar-title">' . __( 'Recent Posts', 'mille-fiori' ) . '</h4><div class="sidebar-separator"></div>';
			foreach ( $recent_posts as $nr => $recent ) {
				if ( $recent['post_status'] != "publish" || $recent['ID'] == $current_id ) {
					continue;
				}
				if ( $nr > 3 ) {
					break;
				}
				if (has_post_thumbnail($recent["ID"])) {
					echo '<div class="recent_post_cell container">'
					     . '<div class="row recent-cell">'
					     . '<div class="col related-image-cell">'
					     . get_the_post_thumbnail($recent["ID"], 'thumbnail') .
					     '</div>'
					     . '<div class="col recent-info">'
					     . '<a href="' . get_permalink($recent["ID"]) . '">'
					     . '<div class="recent-title">' . $recent["post_title"] . '</div>'
					     . '</a>'
					     . '<h6 class="blog-post-date">' . get_the_date('d/m/Y', $recent["ID"]) . '</h6>'
					     . '</div>'
					     . '</div>'
					     . '</div>';
				} else {
					echo '<div>'
					     . '<a href="' . get_permalink($recent["ID"]) . '">'
					     . '<div class="recent-title">' . $recent["post_title"] . '</div>'
					     . '</a>'
					     . '</div> ';
				}


			}
			echo '</div>';
		}
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	public function form( $instance ) {

	}
}