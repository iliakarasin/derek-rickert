<?php
/**
 * derek-rickert functions and definitions
 *
 * @package derek-rickert
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'derek_rickert_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function derek_rickert_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
  add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'derek-rickert' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
  // Custom post types
	register_post_type( 'videos',
		array(
			'labels' => array(
				'name' => __( 'Videos' ),
				'singular_name' => __( 'Video' )
			),
		'supports' => array( 'title', 'thumbnail', 'editor' ),
		'public' => true,
		'has_archive' => true,
		'menu_icon'           => 'dashicons-format-video',
    'show_in_nav_menus'   => true
		)
	);
	
	register_post_type( 'slides',
		array(
			'labels' => array(
				'name' => __( 'Slides' ),
				'singular_name' => __( 'Slide' )
			),
		'supports' => array( 'title', 'thumbnail' ),
		'public' => true,
		'has_archive' => true,
		'menu_icon'           => 'dashicons-format-image',
    'show_in_nav_menus'   => true
		)
	);
}
endif; // derek_rickert_setup
add_action( 'after_setup_theme', 'derek_rickert_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function derek_rickert_scripts() {
  // styles
	wp_enqueue_style( 'derek-rickert-supersized', get_template_directory_uri() . '/stylesheets/supersized.css');
	wp_enqueue_style( 'derek-rickert-supersized-theme', get_template_directory_uri() . '/stylesheets/supersized.shutter.css');
	wp_enqueue_style( 'derek-rickert-style', get_template_directory_uri() . '/stylesheets/screen.css');

  // js
  // wp_enqueue_script( 'derek-rickert-script', get_template_directory_uri() . '/js/script.js', array('jquery') );
	wp_enqueue_script( 'derek-rickert-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery') );
	wp_enqueue_script( 'derek-rickert-supersized', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array('jquery') );
	wp_enqueue_script( 'derek-rickert-supersized-theme', get_template_directory_uri() . '/js/supersized.shutter.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'derek_rickert_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
