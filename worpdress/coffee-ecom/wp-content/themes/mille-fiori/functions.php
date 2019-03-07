<?php
/**
 * mille-fiori functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mille-fiori
 */

if ( ! function_exists( 'mille_fiori_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mille_fiori_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mille-fiori, use a find and replace
		 * to change 'mille-fiori' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mille-fiori', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mille-fiori' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mille_fiori_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mille_fiori_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mille_fiori_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mille_fiori_content_width', 640 );
}

add_action( 'after_setup_theme', 'mille_fiori_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mille_fiori_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mille-fiori' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mille-fiori' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'mille-fiori' ),
		'id'            => 'woocommerce',
		'description'   => 'Woocommerce sidebar widget area',
		'before_title'  => '<h4 class="sidebar-title">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'mille_fiori_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mille_fiori_scripts() {
	wp_enqueue_style( 'mille-fiori-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mille-fiori-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mille-fiori-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'mille_fiori_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-controls.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load custom widgets.
 */
require get_template_directory() . '/inc/widgets-implementations.php';

/**
 * Load navigation.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Load social sharing.
 */
require get_template_directory() . '/inc/social-sharing.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Elementor custom widgets.
 */
require get_template_directory() . '/inc/elementor-widgets.php';

/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';

/**
 * Load Email handling
 */
require_once get_template_directory() . '/inc/email_handling.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


function my_menu_notitle( $menu ) {
	return $menu = preg_replace( '/ title="(.*?)"/', '', $menu );
}

add_filter( 'wp_nav_menu', 'my_menu_notitle' );

add_filter( 'wp_page_menu', 'my_menu_notitle' );

add_filter( 'wp_list_categories', 'my_menu_notitle' );

add_filter( 'wp_list_pages', 'my_menu_notitle' );

/**
 * Filter the except length to 50 words.
 */
add_filter( 'excerpt_length', function () {
	return 50;
}, 999 );


function theme_get_option( $option_name, $default_value = '' ) {
	$option_data = get_option( 'theme_options' );
	if ( isset( $option_data[ $option_name ] ) && $option_data[ $option_name ] != '' ) {
		return $option_data[ $option_name ];
	} elseif ( $default_value ) {
		return $default_value;
	} else {
		return false;
	}
}

register_nav_menus( array(
	'nav_right' => 'Right part of nav menu',
) );


set_post_thumbnail_size( 360, 220, true );
add_image_size( 'big-featured-image', 730, 400, array( 'center', 'center' ) );

add_image_size( 'middle-featured-image', 530, 350, array( 'center', 'center' ) );

function include_font_awesome() {
	function include_fa() {
		wp_enqueue_style( 'font-awesome', get_template_directory() . '/assets/font-awesome/css/font-awesome.min.css' );
	}

	add_action( 'wp_enqueue_scripts', 'include_fa' );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 4 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 25 );
