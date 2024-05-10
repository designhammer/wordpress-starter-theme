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
 * Changes markup for search form.
 *
 * @param resource $form Adjust search form markup for a better a11y UX.
 */
function starter_search_form( $form ) {
	$form = '<form method="get" class="search-form" action="' . home_url( '/' ) . '" >
		<div role="search"><label for="Search">' . __( 'Search for:' ) . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="Search" class="search-field">
			<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Submit' ) . '" class="search-submit">
		</div>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'starter_search_form', 40 );

/**
 * Includes parent page title in HTML <title> if on a child page.
 *
 * @param array $title_parts_array Returns document title for the current page.
 *
 * @link https://developer.wordpress.org/reference/hooks/document_title_parts/
 */
function starter_custom_html_title( $title_parts_array ) {
	if ( is_home() ) {
		$title_parts_array['title'] = 'Blog';
		if ( get_query_var( 'paged' ) === 0 ) {
			$title_parts_array['title'] = 'Blog - Page 1';
		}
	} elseif ( wp_get_post_parent_id( get_the_ID() ) ) {
		$title_parts_array['title'] = get_the_title() . ' - ' . get_the_title( wp_get_post_parent_id( get_the_ID() ) );
	} else {
		$title_parts_array['title'] = get_the_title();
	}

	$title_parts_array['site'] = get_bloginfo( 'name' );

	return $title_parts_array;
}
add_filter( 'document_title_parts', 'starter_custom_html_title', 10 );

/**
 * Adds toggle button for drop-down menu.
 */
require get_template_directory() . '/inc/class-button-sublevel-walker.php';

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
