<?php
/**
 * Lighthouse functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lighthouse
 */

if ( ! function_exists( 'lighthouse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lighthouse_setup() {
    // This theme styles the visual editor to resemble the theme style.
	$font_url_Questrial = 'https://fonts.googleapis.com/css?family=Questrial';

	$font_url_Raleway = 'https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,600,100';

	$font_url_Montserrat = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';

	add_editor_style( 
		array( 
			'style.css', str_replace( ',', '%2C', $font_url_Questrial), str_replace( ',', '%2C', $font_url_Raleway), str_replace( ',', '%2C', $font_url_Montserrat)
			) 
		);
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lighthouse, use a find and replace
	 * to change 'lighthouse' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lighthouse', get_template_directory() . '/languages' );

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

	add_image_size( 'lighthouse_feature_img', 1000, 310, array( 'center', 'center' ) );

	add_image_size( 'lighthouse_blog_listing', 714, 274, array( 'center', 'center' ) );

	add_image_size( 'lighthouse_related_post', 475, 280, array( 'center', 'center' ) );


	/*
	 * Enable support for Shortcode in text widget
	 *
	 */
	add_filter('widget_text', 'do_shortcode');
	
	/*
	 * Default HTML5 Form
	 *
	 * @link https://codex.wordpress.org/Function_Reference/get_search_form
	 */
	add_theme_support( 'html5', array( 'search-form' ) ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lighthouse' ),
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
	add_theme_support( 'custom-background', apply_filters( 'lighthouse_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif;
add_action( 'after_setup_theme', 'lighthouse_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lighthouse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lighthouse_content_width', 640 );
}
add_action( 'after_setup_theme', 'lighthouse_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function lighthouse_scripts() {

	wp_enqueue_style( 'lighthouse-style', get_stylesheet_uri() );

	wp_enqueue_style('lighthouse-google-fonts-questrial', 'https://fonts.googleapis.com/css?family=Questrial');

	wp_enqueue_style('lighthouse-google-fonts-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,600,100');

	wp_enqueue_style('lighthouse-google-fonts-montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');

	wp_enqueue_script( 'lighthouse-classList-js', 'https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js', array('jquery'), '');

	wp_enqueue_script( 'lighthouse-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-material-menu-js', get_template_directory_uri() . '/js/materialMenu.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-owl-carousel-js', get_template_directory_uri() . '/js/owl-carousel.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-match-height-js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'lighthouse-settings-js', get_template_directory_uri() . '/js/lighthouse-settings.min.js', array('jquery'), '20160220', true );

	wp_enqueue_script( 'lighthouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lighthouse_scripts' );


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


/**
 * Custom Include files
 */

// ACF
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );

// ACF Settings
include_once( get_stylesheet_directory() . '/includes/acf-settings.php' );

// Widgets
include_once( get_stylesheet_directory() . '/includes/widgets.php' );

// Menus
include_once( get_stylesheet_directory() . '/includes/menus.php' );

// Theme Settings
include_once( get_stylesheet_directory() . '/includes/theme-settings.php' );

// Shortcodes
include_once( get_stylesheet_directory() . '/includes/shortcodes.php' );
