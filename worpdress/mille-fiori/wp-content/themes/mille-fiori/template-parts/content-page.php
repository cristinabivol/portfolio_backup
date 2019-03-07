<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mille-fiori
 */
global $page;
?>

<article class="modal-content2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="page-header">
		<div class="intro-text">
			<?php the_title( '<h1 class="intro-heading">', '</h1>' ); ?>
			<div class="intro-separator"></div>
		</div><!-- .entry-header -->
	</div>
	<?php the_post_thumbnail( 'big-featured-image' ); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mille-fiori' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mille-fiori' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
