<?php
/**
 * Single post partial template.
 *
 * @package wedding
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'big-featured-image' ); ?>

	<header class="entry-header">
		<h6 class="blog-date"><?php echo get_the_date() ?> - <?php the_category( ', ' ); ?></h6>
		<?php the_title( '<h2 class="blog-title special-title">', '</h2>' ); ?>


	</header><!-- .entry-header -->

	<div class="entry-content blog-post-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'wedding' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php

		$url       = urlencode( get_permalink() );
		$title     = str_replace( ' ', '%20', get_the_title() );
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

		$twitterURL   = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=Crunchify';
		$facebookURL  = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
		$whatsappURL  = 'whatsapp://send?text=' . $title;
		$linkedInURL  = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&amp;title=' . $title;
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $thumbnail[0] . '&amp;description=' . $title;
		?>
		<div>
			<ul class="list-inline social-buttons">
				<li><a target="_blank" href="<?php echo $twitterURL; ?>"><i class="fa fa-twitter"></i></a>
				<li><a target="_blank" href="<?php echo $facebookURL; ?>"><i class="fa fa-facebook"></i></a>
				<li><a target="_blank" href="<?php echo $linkedInURL; ?>"><i class="fa fa-linkedin"></i></a>
				<li><a target="_blank" href="<?php echo $pinterestURL; ?>"><i class="fa fa-pinterest"></i></a>
				<li><a target="_blank" href="<?php echo $whatsappURL; ?>"><i class="fa fa-whatsapp"></i></a>
			</ul>
		</div>
	</footer>

</article><!-- #post-## -->
