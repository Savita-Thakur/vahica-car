<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'travel-car' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hn3FEscqdo5V1IY7Zu2gYbK9DpFASTtGHyV2sWCp4T8psr8rJnPieNzcTFfZxgiV' );
define( 'SECURE_AUTH_KEY',  'L04B2YKQ8ZyX1Duzf7jIDM07BzqGUhicmzW2EkFgEdfrzSgHZ3jvCzez91OZLmCc' );
define( 'LOGGED_IN_KEY',    'YU5E4XJDOFWzqArs23T1hypXJ8a3mlKZ7FBQEcNa0S13BWt2OScfCuEpkDXARO7I' );
define( 'NONCE_KEY',        'Q6gbrxpQD9zH19irgv842G2NmxjzlGe2vXywWOYBH4IEn67SkyIXL2xGFk8MnrHp' );
define( 'AUTH_SALT',        'sbEopDk7KlD86VKokKBYgLMbZebZbSIrOUozJXNWjNVY0AKClBN5NfWtUp0Wmqyc' );
define( 'SECURE_AUTH_SALT', 'mJ8fYzQgltdU7HjYrE5ePJPg806C8UdoQd4h5ylnWLPqGXhqNjIs2KyrlnKcwUUD' );
define( 'LOGGED_IN_SALT',   'STpuvqdCZIFCwQx2zGCSkaEtBOBP8Y5Q9fNijWKdCS0jyDlC1ZBlvuVvHZKhqRZD' );
define( 'NONCE_SALT',       '5sRepThpMKmP7AGbagLiUXPEzlvcEjWw7tPaS4dAluocamOlTw7c8RL1cHLWJZaP' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
