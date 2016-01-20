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
	 * Lighthouse custom header menus
	 *
	 */
	function lighthouse_menus() {
		register_nav_menus(
			array(
				'header-menu-left' => __( 'Header menu left', 'nav menu location', 'lighthouse' ),
				'header-menu-right' => __( 'Header menu right' , 'nav menu location', 'lighthouse'),
				'footer-menu' => __( 'Footer menu' , 'nav menu location', 'lighthouse'),
				'footer-menu-bottom' => __( 'Footer menu bottom' , 'nav menu location', 'lighthouse')
				)
			);
	}
	add_action( 'init', 'lighthouse_menus' );

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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lighthouse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lighthouse' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lighthouse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lighthouse_scripts() {

	wp_enqueue_style( 'lighthouse-font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style( 'lighthouse-style', get_stylesheet_uri() );

	wp_enqueue_style('lighthouse-google-fonts', 'https://fonts.googleapis.com/css?family=Questrial');

	//wp_enqueue_style('lighthouse-owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css');

	wp_enqueue_script( 'lighthouse-classList-js', 'https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js', array('jquery'), '');

	wp_enqueue_script( 'lighthouse-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-material-menu-js', get_template_directory_uri() . '/js/materialMenu.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-owl-carousel-js', get_template_directory_uri() . '/js/owl-carousel.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lighthouse-settings-js', get_template_directory_uri() . '/js/lighthouse-settings.js', array('jquery'), '', true );

	wp_enqueue_script( 'lighthouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lighthouse_scripts' );


/**
 * Read More button in excerpt
 */
function new_excerpt_more( $more ) {
    return ' ';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Custome Lenght of excerpt
 */
function custom_excerpt_length( $length ) {
    return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//callback function for the 'clear_content' shortcode
function recent_post_slider($atts){

	echo'<div class="post-slider row"><div id="recent-posts" class="owl-carousel">';

	global $post;

	$post_query = new WP_Query( array(
		'post_type' => 'post',
		'posts_per_page' => 12,
		'order'=>'DESC',
		'orderby' => 'date',
		)
	);

	if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post();

		$thumb_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'lighthouse_related_post');
		$url_post = $thumb_post[0];
		$content = get_the_content();

		echo '<div class="col-xs-12"><div class="thumbnail thumbnail-hover">';

		echo'<img class="img-responsive" src=" ' . $url_post . '">';

		echo '<a href=" ' . get_permalink() .' " " title=" ' .  get_the_title() .' " class="overlay"></a>';

		echo'</div>';
		
		echo'<div class="entry">';

		echo '<h3><a href=" ' . get_permalink() . ' "> ' . get_the_title() . '</a></h3>';

		echo '<span class="date"> <i class="fa fa-clock-o"></i> ' . get_the_time(get_option('date_format')) .'</span>';
		
		echo '<div class="entry-content">' . wp_trim_words( $content , '27' ) . '</div>';

		echo '<div class="read-more">';

		echo '<a href="' . get_permalink() . ' " class="btn read-more-btn">View Article</a>';

		echo '</div>';

		echo '</div></div>';

		endwhile;
	    wp_reset_postdata();
	endif;
		
		echo '</div></div>';

}
//add the new 'recent_posts' shortcode
add_shortcode('recent_posts','recent_post_slider');


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
