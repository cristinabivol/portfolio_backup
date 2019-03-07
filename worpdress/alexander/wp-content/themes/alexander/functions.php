<?php
/**
 * Understrap functions and definitions
 *
 * @package alexander
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/customizer/customizer.php';
require get_template_directory() . '/customizer/customizer-controls.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/widgets-implementations.php';

require get_template_directory() . '/inc/elementor-widgets.php';

/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';

if (function_exists('add_theme_support')) {
	add_theme_support('sidebar-thumb');
	set_post_thumbnail_size(360, 220, true); // default Post Thumbnail dimensions
}

add_image_size('big-featured-image', 1050, 700, array('center', 'center'));

add_image_size('tall-medium-image', 300, 400, array('center', 'center'));

add_image_size('square-image', 250, 250, array('center', 'center'));

function my_menu_notitle($menu)
{
	return $menu = preg_replace('/ title="(.*?)"/', '', $menu);
}

add_filter('wp_nav_menu', 'my_menu_notitle');

add_filter('wp_page_menu', 'my_menu_notitle');

add_filter('wp_list_categories', 'my_menu_notitle');

add_filter('wp_list_pages', 'my_menu_notitle');


add_action("wp_ajax_contact_send", "sendContactMail");
add_action("wp_ajax_nopriv_contact_send", "sendContactMail");

function sendContactMail()
{
	$name = sanitize_text_field($_POST["name"]);
	$email = sanitize_email($_POST["email"]);
	$subject = sanitize_text_field($_POST["subject"]);
	$message = esc_textarea($_POST["message"]);
	$headers = "From: $name <$email>" . "\r\n";
	$to = get_option('admin_email');

	$isSend = wp_mail($to, $subject, $message, $headers);
	if ($isSend) {
		return true;
	}
	header('HTTP/1.0 404 Not Found');
	exit;
}

add_action("wp_ajax_book_send", "sendBookMail");
add_action("wp_ajax_nopriv_book_send", "sendBookMail");

function sendBookMail()
{
	$name = sanitize_text_field($_POST["name"]);
	$phone = sanitize_email($_POST["phone"]);
	$amount = sanitize_text_field($_POST["amount"]);
	$datetime = esc_textarea($_POST["datetime"]);
	$message = 'You have new book rezervation from ' . $name . ' with phone number: ' . $phone . '.';
	$message .= 'Rezervation is for: ' . $amount . ' places for date and time: ' . $datetime;
	$headers = "From: $name" . "\r\n";
	$to = get_option('admin_email');

	$isSend = wp_mail($to, 'Rezervation Request', $message, $headers);
	if ($isSend) {
		return true;
	}
	header('HTTP/1.0 404 Not Found');
	exit;
}

add_action("wp_ajax_subscribe_send", "sendSubscribeMail");
add_action("wp_ajax_nopriv_subscribe_send", "sendSubscribeMail");

function sendSubscribeMail()
{
	$email = sanitize_email($_POST["phone"]);
	$message = 'You have new subscription request placed for email: ' . $email;
	$to = get_option('admin_email');
	$isSend = wp_mail($to, 'Subscription Request', $message);
	if ($isSend) {
		return true;
	}
	header('HTTP/1.0 404 Not Found');
	exit;
}