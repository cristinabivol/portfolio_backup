<?php
/**
 * Left sidebar check.
 *
 * @package understrap
 */

$html = '';

$html = '<div class="';
if ( is_active_sidebar( 'right' ) ) {
	$html .= 'col-12 col-md-8 col-lg-8 content-area" id="primary">';
} else {
	$html .= 'col-12 col-md-8 col-lg-8 content-area" id="primary">';
}
echo $html; // WPCS: XSS OK.


