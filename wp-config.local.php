<?php

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', false ); // Keep a log of WordPress errors.
define( 'SAVEQUERIES', false ); // Additional DB debug details.
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true ); // Disable error emails.
define( 'WP_ENVIRONMENT_TYPE', 'local' ); // Environment indicator.

define( 'DB_NAME', 'example_local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', '127.0.0.1' );

define( 'WP_HOME', 'https://local.example.test' );
define( 'WP_SITEURL', 'https://local.example.test' );

// Main switch to get frontend assets from a Vite dev server OR from production built folder
define( 'IS_VITE_DEVELOPMENT', true );
