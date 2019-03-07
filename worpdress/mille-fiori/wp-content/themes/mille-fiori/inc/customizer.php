<?php

/**
 * Mille Fiori Theme Customizer
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
class MileFiori_Customizer {

	public static function Register( $wp_customize ) {
		self::Sections( $wp_customize );
		self::Controls( $wp_customize );
	}

	public static function Sections( $wp_customize ) {

		$wp_customize->add_setting( 'theme_options[millefiori_display_header_text]', [
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'option',
				'default'           => false
			]
		);
		$wp_customize->add_control( 'millefiori_display_header_text', [
				'label'       => __( 'Display Header Text?', 'mille-fiori' ),
				'description' => __( 'Check if you want to display header text in place of logo.', 'mille-fiori' ),
				'section'     => 'title_tagline',
				'settings'    => 'theme_options[millefiori_display_header_text]',
				'type'        => 'checkbox'
			]
		);

		/**
		 * Footer section panel
		 */
		$wp_customize->add_panel( 'page_footer_setting_panel', [
				'title'       => __( 'Footer Section', 'mille-fiori' ),
				'description' => __( 'Allows you to set up Footer elements.', 'mille-fiori' ), //Descriptive tooltip
				'priority'    => '12',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Footer Main Section
		 */
		$wp_customize->add_section( 'pagefooter_setting_section', [
				'title'       => __( 'Footer Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to set up Contact heading and background image', 'mille-fiori' ),
				//Descriptive tooltip
				'panel'       => 'page_footer_setting_panel',
				'priority'    => '1',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Page animation panel
		 */
		$wp_customize->add_panel( 'page_animation_setting_panel', [
				'title'       => __( 'Page Settings Section', 'mille-fiori' ),
				'description' => __( 'Allows you to set up animations.', 'mille-fiori' ),
				'priority'    => '12',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Page Animation Section
		 */
		$wp_customize->add_section( 'pageanimation_setting_section', [
				'title'       => __( 'Animation Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to turn on/off animation.', 'mille-fiori' ),
				//Descriptive tooltip
				'panel'       => 'page_animation_setting_panel',
				'priority'    => '1',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Page Onepage Menu Section
		 */
		$wp_customize->add_section( 'onepagemenu_setting_section', [
				'title'       => __( 'Onepage Menu Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to turn on/off animation.', 'mille-fiori' ),
				//Descriptive tooltip
				'panel'       => 'page_animation_setting_panel',
				'priority'    => '1',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Page Color Section
		 */
		$wp_customize->add_section( 'pagecolor_setting_section', [
				'title'       => __( 'Page Color Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to customize default colors.', 'mille-fiori' ),
				'panel'       => 'page_animation_setting_panel',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Footer Social Section
		 */
		$wp_customize->add_section( 'pagefooter_social_setting_section', [
				'title'       => __( 'Footer Social Media Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to set up external social media links', 'mille-fiori' ), //Descriptive tooltip
				'panel'       => 'page_footer_setting_panel',
				'priority'    => '2',
				'capability'  => 'edit_theme_options'
			]
		);

		/**
		 * Footer section panel
		 */
		$wp_customize->add_panel( 'page_header_setting_panel', [
				'title'       => __( 'Header Section', 'mille-fiori' ),
				'description' => __( 'Allows you to set up Header elements.', 'mille-fiori' ), //Descriptive tooltip
				'priority'    => '1',
				'capability'  => 'edit_theme_options'
			]
		);
		/**
		 * Header Image Section
		 */
		$wp_customize->add_section( 'millefiori_main_carousel_setting_section', [
				'title'       => __( 'Header Image Settings', 'mille-fiori' ),
				'description' => __( 'Allows you to set up slider images', 'mille-fiori' ), //Descriptive tooltip
				'panel'       => 'page_header_setting_panel',
				'priority'    => '2',
				'capability'  => 'edit_theme_options'
			]
		);
		$wp_customize->add_section( 'millefiori_header_logo_setting_section', [
				'title'       => __( 'Header Logo', 'mille-fiori' ),
				'description' => __( 'Allows you to set up header logo', 'mille-fiori' ), //Descriptive tooltip
				'panel'       => 'page_header_setting_panel',
				'priority'    => '1',
				'capability'  => 'edit_theme_options'
			]
		);
	}

	public static function Controls( $wp_customize ) {
		$sections = self::Section_Content();
		$settings = self::Theme_Settings();
		foreach ( $sections as $section_id => $section_content ) {
			foreach ( $section_content as $section_content_id ) {
				switch ( $settings[ $section_content_id ]['setting_type'] ) {
					case 'image':
						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_url' );
						$wp_customize->add_control( new WP_Customize_Image_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id']
							]
						) );
						break;
					case 'text':
						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_text' );
						$wp_customize->add_control( new WP_Customize_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'text'
							]
						) );
						break;
					case 'textarea':
						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_textarea' );

						$wp_customize->add_control( new WP_Customize_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'textarea'
							]
						) );
						break;

					case 'editor':
						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_editor' );

						$wp_customize->add_control( new WP_Customize_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'textarea'
							]
						) );
						break;

					case 'link':

						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_url' );

						$wp_customize->add_control( new WP_Customize_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'text'
							]
						) );

						break;
					case 'color':

						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_color' );

						$wp_customize->add_control( new WP_Customize_Color_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id']
							]
						) );
						break;

					case 'radio':

						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_radio' );

						$wp_customize->add_control( new WP_Customize_Control(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'radio',
								'choices'     => $settings[ $section_content_id ]['choices']
							]
						) );
						break;

					case 'sort':
						self::add_setting( $wp_customize, $settings[ $section_content_id ]['id'], $settings[ $section_content_id ]['default'], $settings[ $section_content_id ]['type'], 'millefiori_sanitize_sections' );
						$wp_customize->add_control( new Millefiori_Customize_Control_Sortable_Checkboxes(
							$wp_customize, $settings[ $section_content_id ]['id'], [
								'label'       => $settings[ $section_content_id ]['label'],
								'description' => $settings[ $section_content_id ]['description'],
								'section'     => $section_id,
								'settings'    => $settings[ $section_content_id ]['id'],
								'type'        => 'text',
								'choices'     => $settings[ $section_content_id ]['choices']
							]
						) );
						break;

					default:
						break;
				}
			}
		}
	}

	public static function Section_Content() {
		$section_content = [
			'pageanimation_setting_section'            => [
				'millefiori_page_animation'
			],
			'onepagemenu_setting_section'              => [
				'onepage_menu_active'
			],
			'pagecolor_setting_section'                => [
				'button_color',
				'button_hover_color'
			],
			'pagefooter_setting_section'               => [
				'millefiori_footer_logo',
				'millefiori_footer_address',
				'millefiori_footer_phone',
				'millefiori_footer_email'
			],
			'pagefooter_social_setting_section'        => [
				'millefiori_footer_social1',
				'millefiori_footer_social1thumb',
				'millefiori_footer_social2',
				'millefiori_footer_social2thumb',
				'millefiori_footer_social3',
				'millefiori_footer_social3thumb',
				'millefiori_footer_social4',
				'millefiori_footer_social4thumb',
				'millefiori_footer_social5',
				'millefiori_footer_social5thumb'
			],
			'millefiori_header_logo_setting_section'   => [
				'millefiori_header_logo'
			],
			'millefiori_main_carousel_setting_section' => [
				'small_header_bg_image',
			],
		];

		return $section_content;
	}

	public static function Theme_Settings() {

		$choices  = [];
		$sections = sections();
		foreach ( $sections as $key => $val ) {
			$choices[ $key ] = $val['label'];
		}
		$customizer_settings = [
			/**
			 * mille-fiori header
			 */
			'millefiori_header_logo' => [
				'id'           => 'theme_options[millefiori_header_logo]',
				'label'        => __( 'Header Logo', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'image',
				'default'      => ''
			],
			'small_header_bg_image'  => [
				'id'           => 'theme_options[small_header_bg_image]',
				'label'        => __( 'Small Header Background Image', 'mille-fiori' ),
				'description'  => __( 'Background image for header which is used on blog pages', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'image',
				'default'      => ''
			],

			'millefiori_page_animation' => [
			'id'           => 'theme_options[millefiori_page_animation]',
			'label'        => __( 'Page Animation Option(write "on" to enable.)', 'mille-fiori' ),
			'description'  => __( '', 'mille-fiori' ),
			'type'         => 'option',
			'setting_type' => 'text',
			'default'      => 'off'
		],

			'onepage_menu_active' => [
				'id'           => 'theme_options[onepage_menu_active]',
				'label'        => __( 'Onepage Menu animation.', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => 'off'
			],

			'button_color' => [
				'id'           => 'theme_options[button_color]',
				'label'        => __( 'Button default hover color.', 'mille-fiori' ),
				'description'  => __( 'Setup button default color.', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'color',
				'default'      => '#ebaca5'
			],

			'button_hover_color' => [
				'id'           => 'theme_options[button_hover_color]',
				'label'        => __( 'Button default hover color.', 'mille-fiori' ),
				'description'  => __( 'Setup button hover default color.', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'color',
				'default'      => '#ffffff'
			],

			/**
			 * mille-fiori Footer
			 */

			'millefiori_footer_logo'    => [
				'id'           => 'theme_options[millefiori_footer_logo]',
				'label'        => __( 'Footer Logo', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'image',
				'default'      => ''
			],
			'millefiori_footer_address' => [
				'id'           => 'theme_options[millefiori_footer_address]',
				'label'        => __( 'Footer address', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_phone'      => [
				'id'           => 'theme_options[onapage_footer_phone]',
				'label'        => __( 'Footer Phone', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_email'   => [
				'id'           => 'theme_options[millefiori_footer_email]',
				'label'        => __( 'Footer email', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],

			'millefiori_footer_social1'      => [
				'id'           => 'theme_options[millefiori_footer_social1]',
				'label'        => __( 'Footer Social button #1 Link', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social1thumb' => [
				'id'           => 'theme_options[millefiori_footer_social1thumb]',
				'label'        => __( 'Footer Social button #1 font-awesome image code( ex: fa-instagram )', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social2'      => [
				'id'           => 'theme_options[millefiori_footer_social2]',
				'label'        => __( 'Footer Social button #2 Link', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social2thumb' => [
				'id'           => 'theme_options[millefiori_footer_social2thumb]',
				'label'        => __( 'Footer Social button #2 font-awesome image code( ex: fa-instagram )', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social3'      => [
				'id'           => 'theme_options[millefiori_footer_social3]',
				'label'        => __( 'Footer Social button #3 Link', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social3thumb' => [
				'id'           => 'theme_options[millefiori_footer_social3thumb]',
				'label'        => __( 'Footer Social button #3 font-awesome image code( ex: fa-instagram )', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social4'      => [
				'id'           => 'theme_options[millefiori_footer_social4]',
				'label'        => __( 'Footer Social button #4 Link', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social4thumb' => [
				'id'           => 'theme_options[millefiori_footer_social4thumb]',
				'label'        => __( 'Footer Social button #4 font-awesome image code( ex: fa-instagram )', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social5'      => [
				'id'           => 'theme_options[millefiori_footer_social5]',
				'label'        => __( 'Footer Social button #5 Link', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
			'millefiori_footer_social5thumb' => [
				'id'           => 'theme_options[millefiori_footer_social5thumb]',
				'label'        => __( 'Footer Social button #5 font-awesome image code( ex: fa-instagram )', 'mille-fiori' ),
				'description'  => __( '', 'mille-fiori' ),
				'type'         => 'option',
				'setting_type' => 'text',
				'default'      => ''
			],
		];

		return $customizer_settings;
	}

	public static function add_setting( $wp_customize, $setting_id, $default, $type, $sanitize_callback ) {
		$wp_customize->add_setting( $setting_id, [
				'default'           => $default,
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => [ 'MileFiori_Customizer', $sanitize_callback ],
				'type'              => $type
			]
		);
	}

	/**
	 * adds sanitization callback funtion : textarea
	 */
	public static function millefiori_sanitize_textarea( $value ) {
		$value = wp_kses_post( $value );

		return $value;
	}

	/**
	 * adds sanitization callback funtion : url
	 */
	public static function millefiori_sanitize_url( $value ) {
		$value = esc_url( $value );

		return $value;
	}

	public static function millefiori_sanitize_text( $value ) {
		$value = sanitize_text_field( $value );

		return $value;
	}

	public static function millefiori_sanitize_editor( $value ) {
		$array       = wp_kses_allowed_html( 'post' );
		$allowedtags = [
			'iframe' => [
				'width'        => [],
				'height'       => [],
				'frameborder'  => [],
				'scrolling'    => [],
				'src'          => [],
				'marginwidth'  => [],
				'marginheight' => []
			]
		];
		$data        = array_merge( $allowedtags, $array );
		$value       = wp_kses( $value, $data );

		return $value;
	}

	public static function millefiori_sanitize_email( $value ) {
		$value = sanitize_email( $value );

		return $value;
	}

	public static function millefiori_sanitize_number( $value ) {
		$value = preg_replace( "/[^0-9+ ]/", "", $value );

		return $value;
	}

	public static function millefiori_sanitize_select( $value, $setting ) {
		global $wp_customize;
		$control = $wp_customize->get_control( $setting->id );
		if ( array_key_exists( $value, $control->choices ) ) {
			return $value;
		} else {
			return $setting->default;
		}
	}

	public static function millefiori_sanitize_radio( $value, $setting ) {
		global $wp_customize;
		$control = $wp_customize->get_control( $setting->id );
		if ( array_key_exists( $value, $control->choices ) ) {
			return $value;
		} else {
			return $setting->default;
		}
	}

	/**
	 * Sanitize Sharing Services
	 */
	public static function millefiori_sanitize_sections( $input ) {

		/* Var */
		$output = [];

		/* Get valid services */
		$valid_sections = sections();

		/* Make array */
		$sections = explode( ',', $input );

		/* Bail. */
		if ( ! $sections ) {
			return null;
		}

		/* Loop and verify */
		foreach ( $sections as $section ) {

			/* Separate section and status */
			$section = explode( ':', $section );

			if ( isset( $section[0] ) && isset( $section[1] ) ) {
				if ( array_key_exists( $section[0], $valid_sections ) ) {
					$status   = $section[1] ? '1' : '0';
					$output[] = trim( $section[0] . ':' . $status );
				}
			}
		}

		return trim( esc_attr( implode( ',', $output ) ) );
	}

	/**
	 * adds sanitization callback funtion : number
	 */
	public static function millefiori_sanitize_color( $value ) {
		$value = sanitize_hex_color( $value );

		return $value;
	}

}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', [ 'MileFiori_Customizer', 'Register' ] );

function millefiori_registers() {

	/* CSS */
	wp_enqueue_style( 'mille-fiori-sort-control', get_template_directory_uri() . '/css/sort_control.css' );

	/* JS */
	wp_enqueue_script( 'mille-fiori-sort-control', get_template_directory_uri() . '/js/sort_control.js', [
		'jquery',
		'jquery-ui-sortable'
	], '', true );
}

add_action( 'customize_controls_enqueue_scripts', 'millefiori_registers' );