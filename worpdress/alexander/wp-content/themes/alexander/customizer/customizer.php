<?php

/**
 * Alexander Theme Customizer
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
class Alexander_Customizer
{

	public static function Register($wp_customize)
	{
		self::Sections($wp_customize);
		self::Controls($wp_customize);
	}

	public static function Sections($wp_customize)
	{

		$wp_customize->add_setting('theme_options[theme_display_header_text]', [
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
				'type' => 'option',
				'default' => false
			]
		);
		$wp_customize->add_control('theme_display_header_text', [
				'label' => __('Display Header Text?', 'alexander'),
				'description' => __('Check if you want to display header text in place of logo.', 'alexander'),
				'section' => 'title_tagline',
				'settings' => 'theme_options[theme_display_header_text]',
				'type' => 'checkbox'
			]
		);

		/**
		 * heading section
		 */
		$wp_customize->add_panel('page_header_setting_panel', [
				'title' => __('Header Section', 'alexander'),
				'description' => __('Allows you to set up Header elements.', 'alexander'), //Descriptive tooltip
				'priority' => '1',
				'capability' => 'edit_theme_options'
			]
		);


		/**
		 * Testimonials section panel
		 */
		$wp_customize->add_panel('testimonial_setting_panel', [
				'title' => __('Testimonials Section', 'alexander'),
				'description' => __('Allows you to set up Testimonials Section.', 'alexander'), //Descriptive tooltip
				'priority' => '10',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Testimonials box#1
		 */
		$wp_customize->add_section('testimonial_box1_setting_section', [
				'title' => __('Testimonial #1', 'alexander'),
				'description' => __('Allows you to set up Testimonials#1 section content for alexander Theme.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'testimonial_setting_panel',
				'priority' => '11',
				'capability' => 'edit_theme_options'
			]
		);
		/**
		 * Testimonials box#2
		 */
		$wp_customize->add_section('testimonial_box2_setting_section', [
				'title' => __('Testimonial #2', 'alexander'),
				'description' => __('Allows you to set up Testimonials#2 section content for alexander Theme.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'testimonial_setting_panel',
				'priority' => '12',
				'capability' => 'edit_theme_options'
			]
		);
		/**
		 * Testimonials box#3
		 */
		$wp_customize->add_section('testimonial_box3_setting_section', [
				'title' => __('Testimonial #3', 'alexander'),
				'description' => __('Allows you to set up Testimonials#3 section content for alexander Theme.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'testimonial_setting_panel',
				'priority' => '13',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Footer section panel
		 */
		$wp_customize->add_panel('page_footer_setting_panel', [
				'title' => __('Footer Section', 'alexander'),
				'description' => __('Allows you to set up Footer elements.', 'alexander'), //Descriptive tooltip
				'priority' => '12',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Footer Main Section
		 */
		$wp_customize->add_section('pagefooter_setting_section', [
				'title' => __('Footer Settings', 'alexander'),
				'description' => __('Allows you to set up Contact heading and background image', 'alexander'),
				//Descriptive tooltip
				'panel' => 'page_footer_setting_panel',
				'priority' => '1',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Footer Social Section
		 */
		$wp_customize->add_section('pagefooter_social_setting_section', [
				'title' => __('Footer Social Media Settings', 'alexander'),
				'description' => __('Allows you to set up external social media links', 'alexander'), //Descriptive tooltip
				'panel' => 'page_footer_setting_panel',
				'priority' => '2',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Footer section panel
		 */

		/**
		 * Header Slider Section
		 */
		$wp_customize->add_section('theme_main_header_settings_section', [
				'title' => __('Header Settings', 'alexander'),
				'description' => __('Allows you to set up slider images', 'alexander'), //Descriptive tooltip
				'panel' => 'page_header_setting_panel',
				'priority' => '2',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 * Page setup
		 */
		$wp_customize->add_panel('page_setting_panel', [
				'title' => __('Page Settings', 'alexander'),
				'description' => __('Allows you to set up pages for alexander Theme.', 'alexander'), //Descriptive tooltip
				'priority' => '14',
				'capability' => 'edit_theme_options'
			]
		);
		/**
		 *  Pages animation section
		 */
		$wp_customize->add_section('page_animation_setting', [
				'title' => __('Animation Settings', 'alexander'),
				'description' => __('Allows you to set on/off animation of alexander Theme.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'page_setting_panel',
				'priority' => '10',
				'capability' => 'edit_theme_options'
			]
		);
		/**
		 *  Pages color section
		 */
		$wp_customize->add_section('page_color_setting', [
				'title' => __('Color Settings', 'alexander'),
				'description' => __('Allows you to set up pages color for alexander Theme.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'page_setting_panel',
				'priority' => '10',
				'capability' => 'edit_theme_options'
			]
		);

		/**
		 *  Pages color section
		 */
		$wp_customize->add_section('page_general_setting', [
				'title' => __('General Settings', 'alexander'),
				'description' => __('Allows you to set some page general settings.', 'alexander'),
				//Descriptive tooltip
				'panel' => 'page_setting_panel',
				'priority' => '10',
				'capability' => 'edit_theme_options'
			]
		);
	}

	public static function Controls($wp_customize)
	{
		$sections = self::Section_Content();
		$settings = self::Theme_Settings();
		foreach ($sections as $section_id => $section_content) {
			foreach ($section_content as $section_content_id) {
				switch ($settings[$section_content_id]['setting_type']) {
					case 'image':
						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_url');
						$wp_customize->add_control(new WP_Customize_Image_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id']
							]
						));
						break;
					case 'text':
						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_text');
						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'text'
							]
						));
						break;
					case 'textarea':
						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_textarea');

						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'textarea'
							]
						));
						break;

					case 'editor':
						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_editor');

						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'textarea'
							]
						));
						break;

					case 'link':

						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_url');

						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'text'
							]
						));

						break;
					case 'color':

						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_color');

						$wp_customize->add_control(new WP_Customize_Color_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id']
							]
						));
						break;

					case 'radio':

						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_radio');

						$wp_customize->add_control(new WP_Customize_Control(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'radio',
								'choices' => $settings[$section_content_id]['choices']
							]
						));
						break;

					case 'sort':
						self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'theme_sanitize_sections');
						$wp_customize->add_control(new Alexander_Customize_Control_Sortable_Checkboxes(
							$wp_customize, $settings[$section_content_id]['id'], [
								'label' => $settings[$section_content_id]['label'],
								'description' => $settings[$section_content_id]['description'],
								'section' => $section_id,
								'settings' => $settings[$section_content_id]['id'],
								'type' => 'text',
								'choices' => $settings[$section_content_id]['choices']
							]
						));
						break;

					default:
						break;
				}
			}
		}
	}

	public static function Section_Content()
	{
		$section_content = [
			'theme_main_header_settings_section' => [
				'small_header_bg_image',
				'theme_slide1_image',
				'theme_slide2_image',
				'theme_slide3_image',
				'theme_slide4_image',
				'theme_slider_text1',
				'theme_slider_text2',
				'theme_slider_text3',
			],
			'testimonial_box1_setting_section' => [
				'theme_testimonial_1_image',
				'theme_testimonial_1_name',
				'theme_testimonial_1_job',
				'theme_testimonial_1_content',
			],
			'testimonial_box2_setting_section' => [
				'theme_testimonial_2_image',
				'theme_testimonial_2_name',
				'theme_testimonial_2_job',
				'theme_testimonial_2_content',
			],
			'testimonial_box3_setting_section' => [
				'theme_testimonial_3_image',
				'theme_testimonial_3_name',
				'theme_testimonial_3_job',
				'theme_testimonial_3_content',
			],

			'pagefooter_setting_section' => [
				'theme_footer_logo',
				'theme_footer_address',
				'onapage_footer_phone',
				'theme_footer_email'
			],
			'pagefooter_social_setting_section' => [
				'theme_footer_social1',
				'theme_footer_social1thumb',
				'theme_footer_social2',
				'theme_footer_social2thumb',
				'theme_footer_social3',
				'theme_footer_social3thumb',
				'theme_footer_social4',
				'theme_footer_social4thumb',
				'theme_footer_social5',
				'theme_footer_social5thumb'
			],

			/**
			 * Page animation settings
			 */
			'page_animation_setting' => [
				'theme_animation_status',
			],
			/**
			 * Page color settings
			 */
			'page_color_setting' => [
				'pages_color_scheme',
				'pages_heading_color_scheme',
				'pages_text_color_scheme',
				'pages_base_background_color',
				'pages_darker_background_color',
				'pages_nav_color',
				'footer_color',
				'footer_background_color'
			],
			'page_general_setting' => [
				'page_header_height',
				'page_header_slider_height'
			]
		];

		return $section_content;
	}

	public static function Theme_Settings()
	{
		$customizer_settings = [
			/**
			 * 'alexander' header
			 */
			'small_header_bg_image' => [
				'id' => 'theme_options[small_header_bg_image]',
				'label' => __('Small Header Background Image', 'alexander'),
				'description' => __('Background image for header which is used on blog pages', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_slide1_image' => [
				'id' => 'theme_options[theme_slide1_image]',
				'label' => __('Header Slide #1 Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_slide2_image' => [
				'id' => 'theme_options[theme_slide2_image]',
				'label' => __('Header Slide #2 Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_slide3_image' => [
				'id' => 'theme_options[theme_slide3_image]',
				'label' => __('Header Slide #3 Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_slide4_image' => [
				'id' => 'theme_options[theme_slide4_image]',
				'label' => __('Header Slide #4 Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_slider_text1' => [
				'id' => 'theme_options[theme_slider_text1]',
				'label' => __('Slider Headline 1', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_slider_text2' => [
				'id' => 'theme_options[theme_slider_text2]',
				'label' => __('Slider Headline 2', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_slider_text3' => [
				'id' => 'theme_options[theme_slider_text3]',
				'label' => __('Slider Headline 3', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],

			/**
			 * 'alexander' Testimonials
			 */
			'theme_testimonial_main_heading' => [
				'id' => 'theme_options[theme_testimonial_main_heading]',
				'label' => __('Main Heading', 'alexander'),
				'description' => __('Write main heading for the testimonial section', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_1_name' => [
				'id' => 'theme_options[theme_testimonial_1_name]',
				'label' => __('Section Name', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_1_job' => [
				'id' => 'theme_options[theme_testimonial_1_job]',
				'label' => __('Section Job', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_1_content' => [
				'id' => 'theme_options[theme_testimonial_1_content]',
				'label' => __('Section Content', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'editor',
				'default' => ''
			],
			'theme_testimonial_1_image' => [
				'id' => 'theme_options[theme_testimonial_1_image]',
				'label' => __('Section Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_testimonial_2_name' => [
				'id' => 'theme_options[theme_testimonial_2_name]',
				'label' => __('Section Name', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_2_job' => [
				'id' => 'theme_options[theme_testimonial_2_job]',
				'label' => __('Section Job', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_2_content' => [
				'id' => 'theme_options[theme_testimonial_2_content]',
				'label' => __('Section Content', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'editor',
				'default' => ''
			],
			'theme_testimonial_2_image' => [
				'id' => 'theme_options[theme_testimonial_2_image]',
				'label' => __('Section Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_testimonial_3_name' => [
				'id' => 'theme_options[theme_testimonial_3_name]',
				'label' => __('Section Name', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_3_job' => [
				'id' => 'theme_options[theme_testimonial_3_job]',
				'label' => __('Section Job', 'alexander'),
				'description' => __('Upload Author Image for first testimonial', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_testimonial_3_content' => [
				'id' => 'theme_options[theme_testimonial_3_content]',
				'label' => __('Section Content', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'editor',
				'default' => ''
			],
			'theme_testimonial_3_image' => [
				'id' => 'theme_options[theme_testimonial_3_image]',
				'label' => __('Section Image', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],

			/**
			 * 'alexander' Footer
			 */

			'theme_footer_logo' => [
				'id' => 'theme_options[theme_footer_logo]',
				'label' => __('Footer Logo', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'image',
				'default' => ''
			],
			'theme_footer_address' => [
				'id' => 'theme_options[theme_footer_address]',
				'label' => __('Footer address', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'onapage_footer_phone' => [
				'id' => 'theme_options[onapage_footer_phone]',
				'label' => __('Footer Phone', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_email' => [
				'id' => 'theme_options[theme_footer_email]',
				'label' => __('Footer email', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],

			'theme_footer_social1' => [
				'id' => 'theme_options[theme_footer_social1]',
				'label' => __('Footer Social button #1 Link', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social1thumb' => [
				'id' => 'theme_options[theme_footer_social1thumb]',
				'label' => __('Footer Social button #1 font-awesome image code( ex: fa-instagram )', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social2' => [
				'id' => 'theme_options[theme_footer_social2]',
				'label' => __('Footer Social button #2 Link', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social2thumb' => [
				'id' => 'theme_options[theme_footer_social2thumb]',
				'label' => __('Footer Social button #2 font-awesome image code( ex: fa-instagram )', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social3' => [
				'id' => 'theme_options[theme_footer_social3]',
				'label' => __('Footer Social button #3 Link', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social3thumb' => [
				'id' => 'theme_options[theme_footer_social3thumb]',
				'label' => __('Footer Social button #3 font-awesome image code( ex: fa-instagram )', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social4' => [
				'id' => 'theme_options[theme_footer_social4]',
				'label' => __('Footer Social button #4 Link', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social4thumb' => [
				'id' => 'theme_options[theme_footer_social4thumb]',
				'label' => __('Footer Social button #4 font-awesome image code( ex: fa-instagram )', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social5' => [
				'id' => 'theme_options[theme_footer_social5]',
				'label' => __('Footer Social button #5 Link', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'theme_footer_social5thumb' => [
				'id' => 'theme_options[theme_footer_social5thumb]',
				'label' => __('Footer Social button #5 font-awesome image code( ex: fa-instagram )', 'alexander'),
				'description' => __('', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],

			/**
			 * Page animation settings
			 */
			'theme_animation_status' => [
				'id' => 'theme_options[theme_animation_status]',
				'label' => __('Theme Animation On/Off Settings', 'alexander'),
				'description' => __('On/Off animation of the theme', 'alexander'),
				'type' => 'option',
				'setting_type' => 'radio',
				'default' => 'on',
				'choices' => [
					'on' => 'On (Default)',
					'off' => 'Off'
				]
			],
			'pages_color_scheme' => [
				'id' => 'theme_options[pages_color_scheme]',
				'label' => __('Pages Accent Color', 'alexander'),
				'description' => __('This option allows you to set accent color scheme for all internal pages.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#e5c07c'
			],
			'pages_heading_color_scheme' => [
				'id' => 'theme_options[pages_heading_color_scheme]',
				'label' => __('Headings Color', 'alexander'),
				'description' => __('This option allows you to set color scheme for all headings on internal pages.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#ebaca5'
			],
			'pages_text_color_scheme' => [
				'id' => 'theme_options[pages_text_color_scheme]',
				'label' => __('Text Color', 'alexander'),
				'description' => __('This option allows you to set color scheme for all text on internal pages.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#333333'
			],
			'pages_base_background_color' => [
				'id' => 'theme_options[pages_base_background_color]',
				'label' => __('Base Background Color', 'alexander'),
				'description' => __('This option allows you to set background base color.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#fff'
			],
			'pages_darker_background_color' => [
				'id' => 'theme_options[pages_darker_background_color]',
				'label' => __('Darker Background Color', 'alexander'),
				'description' => __('This option allows you to set darker background color which is applied to (our story, newsletter, partners).', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#f5eef0'
			],
			'pages_nav_color' => [
				'id' => 'theme_options[pages_nav_color]',
				'label' => __('Top menu color', 'alexander'),
				'description' => __('This option allows you to set main navigation color.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#000'
			],
			'footer_color' => [
				'id' => 'theme_options[footer_color]',
				'label' => __('footer color', 'alexander'),
				'description' => __('This option allows you to set main navigation color.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#cfccd4'
			],
			'footer_background_color' => [
				'id' => 'theme_options[footer_background_color]',
				'label' => __('footer background color', 'alexander'),
				'description' => __('This option allows you to set footer background color.', 'alexander'),
				'type' => 'option',
				'setting_type' => 'color',
				'default' => '#3a3b3f'
			],

			'page_header_height' => [
				'id' => 'theme_options[page_header_height]',
				'label' => __('Background-image section height', 'alexander'),
				'description' => __('This values is in percentage of page height. Please use values between 1 and 100', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			],
			'page_header_slider_height' => [
				'id' => 'theme_options[page_header_slider_height]',
				'label' => __('Header slider height', 'alexander'),
				'description' => __('This values is in percentage of page height. Please use values between 1 and 100', 'alexander'),
				'type' => 'option',
				'setting_type' => 'text',
				'default' => ''
			]
		];

		return $customizer_settings;
	}

	public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback)
	{
		$wp_customize->add_setting($setting_id, [
				'default' => $default,
				'capability' => 'edit_theme_options',
				'sanitize_callback' => ['Alexander_Customizer', $sanitize_callback],
				'type' => $type
			]
		);
	}

	/**
	 * adds sanitization callback funtion : textarea
	 */
	public static function theme_sanitize_textarea($value)
	{
		$value = wp_kses_post($value);

		return $value;
	}

	/**
	 * adds sanitization callback funtion : url
	 */
	public static function theme_sanitize_url($value)
	{
		$value = esc_url($value);

		return $value;
	}

	public static function theme_sanitize_text($value)
	{
		$value = sanitize_text_field($value);

		return $value;
	}

	public static function theme_sanitize_editor($value)
	{
		$array = wp_kses_allowed_html('post');
		$allowedtags = [
			'iframe' => [
				'width' => [],
				'height' => [],
				'frameborder' => [],
				'scrolling' => [],
				'src' => [],
				'marginwidth' => [],
				'marginheight' => []
			]
		];
		$data = array_merge($allowedtags, $array);
		$value = wp_kses($value, $data);

		return $value;
	}

	public static function theme_sanitize_email($value)
	{
		$value = sanitize_email($value);

		return $value;
	}

	public static function theme_sanitize_number($value)
	{
		$value = preg_replace("/[^0-9+ ]/", "", $value);

		return $value;
	}

	public static function theme_sanitize_select($value, $setting)
	{
		global $wp_customize;
		$control = $wp_customize->get_control($setting->id);
		if (array_key_exists($value, $control->choices)) {
			return $value;
		} else {
			return $setting->default;
		}
	}

	public static function theme_sanitize_radio($value, $setting)
	{
		global $wp_customize;
		$control = $wp_customize->get_control($setting->id);
		if (array_key_exists($value, $control->choices)) {
			return $value;
		} else {
			return $setting->default;
		}
	}

	/**
	 * Sanitize Sharing Services
	 */
	public static function theme_sanitize_sections($input)
	{

		/* Var */
		$output = [];

		/* Get valid services */
		$valid_sections = sections();

		/* Make array */
		$sections = explode(',', $input);

		/* Bail. */
		if (!$sections) {
			return null;
		}

		/* Loop and verify */
		foreach ($sections as $section) {

			/* Separate section and status */
			$section = explode(':', $section);

			if (isset($section[0]) && isset($section[1])) {
				if (array_key_exists($section[0], $valid_sections)) {
					$status = $section[1] ? '1' : '0';
					$output[] = trim($section[0] . ':' . $status);
				}
			}
		}

		return trim(esc_attr(implode(',', $output)));
	}

	/**
	 * adds sanitization callback funtion : number
	 */
	public static function theme_sanitize_color($value)
	{
		$value = sanitize_hex_color($value);

		return $value;
	}

}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', ['Alexander_Customizer', 'Register']);

function theme_registers()
{

	/* CSS */
	wp_enqueue_style('alexander-sort-control', get_template_directory_uri() . '/css/sort_control.css');

	/* JS */
	wp_enqueue_script('alexander-sort-control', get_template_directory_uri() . '/js/sort_control.js', [
		'jquery',
		'jquery-ui-sortable'
	], '', true);
}

add_action('customize_controls_enqueue_scripts', 'theme_registers');