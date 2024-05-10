<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package STARTER
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<!-- Google Tag Manager GOES HERE -->

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/apple-touch-icon.png">
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) GOES HERE -->

<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'starter' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-container">

			<div class="site-branding">
				<?php
				the_custom_logo();
				?>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

				<?php
				$starter_description = get_bloginfo( 'description', 'display' );
				if ( $starter_description || is_customize_preview() ) :
					?>
					<div class="site-description"><?php echo $starter_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation">
				<div id="mobile-menu-icon" aria-hidden="true">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</div>
				<button class="menu-button" aria-expanded="false"><span class="visually-hidden">Menu</span></button>

				<div class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
