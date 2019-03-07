<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="right-sidebar widget-area" id="right-sidebar" role="complementary">
	<ul>
	<?php dynamic_sidebar( 'woocommerce' ); ?>
	</ul>
</div><!-- #secondary -->