<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package STARTER
 */

?>

	<footer id="colophon" class="site-footer">
		<h2 class="visually-hidden">Footer</h2>
		<div class="site-info">

			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'starter' ), 'starter', '<a href="https://designhammer.com">DesignHammer, LLC</a>' );
			?>

			<nav class="footer-navigation" aria-label="Footer">
				<h3 id="useful-links" class="visually-hidden">Footer navigation</h3>
				<?php
				wp_nav_menu(
					array(
						'menu_id'        => 'footer-menu',
						'theme_location' => 'menu-2',
						'items_wrap'     => '<ul aria-labelledby="useful-links" id="%1$s" class="%2$s"> %3$s </ul>',
					)
				);
				?>
			</nav>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
