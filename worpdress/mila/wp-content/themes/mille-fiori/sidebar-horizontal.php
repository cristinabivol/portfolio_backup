<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */
if ( ! is_active_sidebar( 'horizontal-sidebar' ) ) {
	return;
}

?>

<div>
	<?php dynamic_sidebar( 'horizontal-sidebar' ); ?>
</div><!-- #secondary -->
