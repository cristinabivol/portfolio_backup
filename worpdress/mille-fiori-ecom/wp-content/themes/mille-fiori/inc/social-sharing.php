<?php
function get_post_social_buttons() {
	global $post;
	if ( is_singular() || is_home() ) {

// Get current page URL
		$url = urlencode( get_permalink() );

// Get current page title
		$title = str_replace( ' ', '%20', get_the_title() );

// Get Post Thumbnail for pinterest
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

// Construct sharing URL without using any script
		$twitterURL  = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $url . '&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
		$whatsappURL = 'whatsapp://send?text=' . $title;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&amp;title=' . $title;

// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . $thumbnail[0] . '&amp;description=' . $title;

// Add sharing button at the end of page/page content
		$content = '';
		$content .= '<div><ul class="list-inline social-buttons">';
		$content .= '<li><a target="_blank" href="' . $twitterURL . '"><i class="fa fa-twitter"></i></a>';
		$content .= '<li><a target="_blank" href="' . $facebookURL . '"><i class="fa fa-facebook"></i></a>';
		$content .= '<li><a target="_blank" href="' . $linkedInURL . '"><i class="fa fa-linkedin"></i></a>';
		$content .= '<li><a target="_blank" href="' . $pinterestURL . '"><i class="fa fa-pinterest"></i></a>';
		$content .= '<li><a target="_blank" href="' . $whatsappURL . '"><i class="fa fa-whatsapp"></i></a>';
		$content .= '</ul></div>';

		return $content;
	} else {
// if not a post/page then don't include sharing button
		return $content;
	}
}