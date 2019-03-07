<?php

/**
 * TGM Init Class
 */

include_once get_template_directory() . '/admin/tgm/class-tgm-plugin-activation.php';

function alexander_register_required_plugins() {

	$plugins = array(
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'WordPress Importer',
			'slug'     => 'wordpress-importer',
			'required' => true,
		),
	);

	$config = array(
		'id'           => 'alexander',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'parent_slug'  => 'themes.php',
		// Parent menu slug.
		'capability'   => 'edit_theme_options',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'alexander_register_required_plugins' );