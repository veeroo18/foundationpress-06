<?php
/**
 * fp6 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fp6
 */

if ( ! function_exists( 'foundation_6_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function foundation_6_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fp6, use a find and replace
	 * to change 'foundation-6' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'foundation-6', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// custom logo 4/13/2016 1:08:18 PM
	add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-width' => true,
	) );

	add_action( 'after_setup_theme', 'theme_prefix_setup' );

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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'foundation_6_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'foundation_6_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function foundation_6_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foundation_6_content_width', 960 );
}
add_action( 'after_setup_theme', 'foundation_6_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foundation_6_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'foundation-6' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'foundation-6' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'foundation_6_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function foundation_6_scripts() {
	wp_enqueue_style( 'foundation-6-style', get_stylesheet_uri() );
	wp_enqueue_style( 'foundation-6-app-style', get_template_directory_uri() .'/css/app.min.css' );

	//wp_enqueue_script( 'foundation-6-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true );
	//wp_enqueue_script( 'foundation-6-js', get_template_directory_uri() . '/js/foundation.min.js', array(), '', true );
	wp_enqueue_script( 'foundation-6-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'foundation-6-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'foundation-6-scripts', get_template_directory_uri() . '/js/app.min.js', array(), '', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foundation_6_scripts' );

// adding new walker from wp-forge.
/**
 * Walkers and menu functions for menus. Big thanks to Jeremy Englert of JointsWP for allowing usage.
 * @see http://jointswp.com/
 * @since WP-Forge 6.2
 */
// Top-Bar Menu Walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}
// Off-Canvas Menu Walker
class Off_Canvas_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu vertical nested\">\n";
    }
}
// Top-Bar Menu function
if ( ! function_exists( 'wpforge_top_nav' ) ) {
	function wpforge_top_nav() {
		 wp_nav_menu(array(
		 	'theme_location' => 'primary',
	        'container' => false,
	        'depth' => 0,
	        'items_wrap' => '<ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown" data-parent-link="true">%3$s</ul>',
	        'fallback_cb' => '',
	        'walker' => new Topbar_Menu_Walker()
	    ));
	} 
}
// Off-Canvas Menu function
if ( ! function_exists( 'wpforge_off_canvas_nav' ) ) {
	function wpforge_off_canvas_nav() {
		 wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'menu_class' => 'vertical menu',       			// Adding custom nav class
	        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu data-parent-link="true">%3$s</ul>',
	        'theme_location' => 'primary',        			// Where it's located in the theme
	        'depth' => 0,                                   // Limit the depth of the nav
	        'fallback_cb' => '',                         	// Fallback function (see below)
	        'walker' => new Off_Canvas_Menu_Walker()
	    ));
	}
}

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => esc_html__( 'Primary', 'foundation-6' ),
	'footer' => esc_html__( 'Footer', 'foundation-6' )
) );





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
