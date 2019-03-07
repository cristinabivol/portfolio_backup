<?php
/**
 * wedding Theme Customizer
 *
 * @package wedding
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wedding_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	function theme_slug_sanitize_select( $input, $setting ) {

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key( $input );

		//get the list of possible select options
		$choices = $setting->manager->get_control( $setting->id )->choices;

		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

	$wp_customize->add_section(
		'wedding_animation_options',
		array(
			'title'       => __( 'Page Loading and Animation Settings', 'wedding' ),
			'priority'    => 30,
			'description' => __( 'This setting will allow you to enable/disable loading page animation(Disable when edit page with Elementor) and fade animation.', 'wedding' )
		)
	);

	$wp_customize->add_setting( 'wedding_loading', array(
		'default'           => 'disable',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'theme_slug_sanitize_select',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'wedding_fade', array(
		'default'           => 'disable',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'theme_slug_sanitize_select',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'wedding_fade_left', array(
		'default'           => 'disable',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'theme_slug_sanitize_select',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'wedding_fade_right', array(
		'default'           => 'disable',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'theme_slug_sanitize_select',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_loading', array(
				'label'             => __( 'Loading Page Animation setup', 'wedding' ),
				'section'           => 'wedding_animation_options',
				'settings'          => 'wedding_loading',
				'type'              => 'select',
				'sanitize_callback' => 'theme_slug_sanitize_select',
				'choices'           => array(
					'enable'  => __( 'Enable', 'wedding' ),
					'disable' => __( 'Disable', 'wedding' ),
				),
				'priority'          => '10',
			)
		) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_fade', array(
				'label'             => __( 'FadeIn Animation Setup', 'wedding' ),
				'section'           => 'wedding_animation_options',
				'settings'          => 'wedding_fade',
				'type'              => 'select',
				'sanitize_callback' => 'theme_slug_sanitize_select',
				'choices'           => array(
					'enable'  => __( 'Enable', 'wedding' ),
					'disable' => __( 'Disable', 'wedding' ),
				),
				'priority'          => '11',
			)
		) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_fade_left', array(
				'label'             => __( 'FadeIn Left Animation Setup', 'wedding' ),
				'section'           => 'wedding_animation_options',
				'settings'          => 'wedding_fade_left',
				'type'              => 'select',
				'sanitize_callback' => 'theme_slug_sanitize_select',
				'choices'           => array(
					'enable'  => __( 'Enable', 'wedding' ),
					'disable' => __( 'Disable', 'wedding' ),
				),
				'priority'          => '11',
			)
		) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'wedding_fade_right', array(
				'label'             => __( 'FadeIn Right Animation Setup', 'wedding' ),
				'section'           => 'wedding_animation_options',
				'settings'          => 'wedding_fade_right',
				'type'              => 'select',
				'sanitize_callback' => 'theme_slug_sanitize_select',
				'choices'           => array(
					'enable'  => __( 'Enable', 'wedding' ),
					'disable' => __( 'Disable', 'wedding' ),
				),
				'priority'          => '11',
			)
		) );


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wedding_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wedding_customize_partial_blogdescription',
		) );
	}
}

add_action( 'customize_register', 'wedding_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wedding_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wedding_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wedding_customize_preview_js() {
	wp_enqueue_script( 'wedding-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'wedding_customize_preview_js' );
