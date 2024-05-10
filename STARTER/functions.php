<?php
/**
 * STARTER functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package STARTER
 */

if ( ! defined( 'STARTER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STARTER_VERSION', '0.1.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_setup() {
	// Add default posts and comments RSS feed links to head.
	// phpcs:ignore // add_theme_support( 'automatic-feed-links' );

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
			'menu-1' => esc_html__( 'Primary', 'starter' ),
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

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'starter_setup' );

/**
 * Enqueue scripts and styles.
 */
function starter_scripts() {
	// styles.
	wp_enqueue_style( 'starter-wp', get_stylesheet_uri(), array(), STARTER_VERSION );
	wp_enqueue_style( 'modern-normalize', get_template_directory_uri() . '/assets/css/modern-normalize.css', array(), STARTER_VERSION );
	wp_enqueue_style( 'starter-style', get_template_directory_uri() . '/assets/css/style.css', array(), STARTER_VERSION );
	// javascript.
	wp_enqueue_script( 'starter-script', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), STARTER_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

/**
 * Enqueue scripts and styles for admin UI.
 */
function starter_admin_scripts() {
	wp_enqueue_style( 'starter-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), STARTER_VERSION );
}
add_action( 'admin_enqueue_scripts', 'starter_admin_scripts' );

/**
 * Widget areas.
 */
require get_template_directory() . '/inc/widgets.php';

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
