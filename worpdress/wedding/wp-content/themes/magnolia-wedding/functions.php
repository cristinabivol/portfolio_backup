<?php
/**
 * wedding functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wedding
 */

if ( ! function_exists( 'wedding_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wedding_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wedding, use a find and replace
		 * to change 'magnolia-wedding' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magnolia-wedding', get_template_directory() . '/languages' );

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
		add_theme_support( 'custom-background', apply_filters( 'wedding_custom_background_args', array(
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
add_action( 'after_setup_theme', 'wedding_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wedding_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wedding_content_width', 640 );
}

add_action( 'after_setup_theme', 'wedding_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wedding_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'magnolia-wedding' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'magnolia-wedding' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'wedding_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wedding_scripts() {
	wp_enqueue_style( 'wedding-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wedding-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wedding-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wedding_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the form handling.
 */
require get_template_directory() . '/inc/email-handling.php';

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load TGMPA
 */
require_once get_template_directory() . '/admin/tgm/tgm-init.php';

/**
 * Load Custom Elementor widgets
 */
require get_template_directory() . '/inc/elementor-widgets.php';


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Main Menu', 'magnolia-wedding' ),
) );

/**
 * Load custom widgets.
 */
require get_template_directory() . '/inc/widgets-implementations.php';


function wedding_header_footer_elementor_support() {
	add_theme_support( 'header-footer-elementor' );
}

set_post_thumbnail_size( 360, 220, true );
add_image_size( 'big-featured-image', 1110, 470, array( 'center', 'center' ) );

add_action( 'after_setup_theme', 'wedding_header_footer_elementor_support' );

register_sidebar(
	array(
		'name'          => __( 'Right Sidebar', 'magnolia-wedding' ),
		'id'            => 'right-sidebar',
		'description'   => 'Right sidebar widget area',
		'before_widget' => '<div class="sidebar-section">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="sidebar-title">',
		'after_title'   => '</h5><div class="sidebar-separator"></div>',
	)
);

register_sidebar(
	array(
		'name'          => __( 'Horizontal Sidebar', 'magnolia-wedding' ),
		'id'            => 'horizontal-sidebar',
		'description'   => 'Horizontal post sidebar widget area',
		'before_widget' => '<div class="sidebar-section">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sidebar-title">',
		'after_title'   => '</h4>',
	)
);


if ( ! function_exists( 'wedding_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function wedding_excerpts_get_more_link( $post_excerpt ) {

		return $post_excerpt . '<div class="read-more-button"><a class="btn" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read more',
				'magnolia-wedding' ) . '</a></div>';
	}
}
add_filter( 'wp_trim_excerpt', 'wedding_excerpts_get_more_link' );

function my_menu_notitle( $menu ) {
	return $menu = preg_replace( '/ title="(.*?)"/', '', $menu );
}

add_filter( 'wp_nav_menu', 'my_menu_notitle' );

add_filter( 'wp_page_menu', 'my_menu_notitle' );

add_filter( 'wp_list_categories', 'my_menu_notitle' );

add_filter( 'wp_list_pages', 'my_menu_notitle' );


function wpdocs_custom_excerpt_length( $length ) {
	return 60;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );