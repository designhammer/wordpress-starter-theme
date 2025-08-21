<?php
/**
 * Starter vite development
 *
 * @package starter
 */

define( 'STARTER_VERSION', '0.1.0' );

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// dist subfolder - defined in vite.config.json.
define( 'DIST_DEF', 'assets/dist' );

// defining some base urls and paths.
define( 'DIST_URI', get_template_directory_uri() . '/' . DIST_DEF );
define( 'DIST_PATH', get_template_directory() . '/' . DIST_DEF );

// default server address, port and entry point can be customized in vite.config.json.
define( 'VITE_SERVER', 'https://localhost:5172' );
define( 'VITE_ENTRY_POINT', '/src/main.js' );

// enqueue hook.
add_action(
	'wp_enqueue_scripts',
	function () {

		if ( defined( 'IS_VITE_DEVELOPMENT' ) && IS_VITE_DEVELOPMENT === true ) {

			/**
			 * Insert HMR into head for live reload.
			 */
			function vite_head_module_hook() {
				echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT . '"></script>'; // phpcs:ignore
			}
			add_action( 'wp_head', 'vite_head_module_hook' );

		} else {

			// ⚠️ production version, 'npm run build' must be executed in order to generate assets.

			// Read manifest.json to figure out what to enqueue.
			$manifest = json_decode( file_get_contents( DIST_PATH . '/.vite/manifest.json' ), true ); // phpcs:ignore
			if ( is_array( $manifest ) ) {

				// Get first key, by default is 'main.js' but can change.
				$manifest_key = array_keys( $manifest );
				if ( isset( $manifest_key[0] ) ) {

					// Enqueue CSS files.
					if ( isset( $manifest[ $manifest_key[0] ]['css'] ) && is_array( $manifest[ $manifest_key[0] ]['css'] ) ) {
						foreach ( $manifest[ $manifest_key[0] ]['css'] as $css_file ) {
							wp_enqueue_style( 'main-style', DIST_URI . '/' . $css_file, array(), STARTER_VERSION );
						}
					}

					// Enqueue main JS file.
					if ( isset( $manifest[ $manifest_key[0] ]['file'] ) ) {
						$js_file = $manifest[ $manifest_key[0] ]['file'];
						if ( ! empty( $js_file ) ) {
							wp_enqueue_script( 'main-script', DIST_URI . '/' . $js_file, array(), STARTER_VERSION, true );
						}
					}
				}
			}
		}
	}
);
