<?php
/**
 * hdg functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hdg
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'hdg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hdg_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on hdg, use a find and replace
		 * to change 'hdg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hdg', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'hdg' ),
				'menu-2' => esc_html__( 'Community', 'hdg' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'hdg_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'hdg_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hdg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hdg_content_width', 640 );
}
add_action( 'after_setup_theme', 'hdg_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hdg_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hdg' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hdg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hdg_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hdg_scripts() {
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Sarabun:100,200,300,400,500,600,700,800,900&display=swap&family=Alex+Brush',false,'1.1','all');

	wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',false,'1.8.1','all');
	wp_enqueue_script( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ,false, '4.5.0', 'all');

	wp_enqueue_style( 'ron-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false );

	wp_enqueue_script( 'gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDfeaxZKZQTdZNaYk2Lg5cPgwCB2L3CURA&libraries=places', array(), _S_VERSION, true );

	wp_enqueue_style( 'hdg-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'hdg-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'date-js', get_template_directory_uri() . '/js/date.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hdg-js', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hdg_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

add_theme_support( 'post-thumbnails' );
add_image_size( 'banner', 1920, 795, false );
add_image_size( 'bg', 1920, 996, false );
add_image_size( 'bg2', 1920, 756, false );
add_image_size( 'bg3', 1920, 1192, false );
add_image_size( 'news-thumbnail', 370, 370, true );
add_image_size( 'sponsor-logo', 160, 160, false );
add_image_size( 'match-slide', 800, 300, false );
add_image_size( 'match-slide-tn', 70, 65,  array( 'center', 'center' ) );

add_filter( 'body_class', 'sk_body_class_for_pages' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function sk_body_class_for_pages( $classes ) {

	if ( is_singular( 'page' ) ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}

	return $classes;

}

// Add not-home to body class
function add_not_home_body_class($classes) {
    if( !is_front_page() ) $classes[] = 'inner';
    return $classes;
}
add_filter('body_class','add_not_home_body_class');

function footer_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'footer_menu' );