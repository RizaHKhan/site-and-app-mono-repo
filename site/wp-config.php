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
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME') ?: 'wordpress_db');

/** Database username */
define('DB_USER', getenv('DB_USER') ?: 'root');

/** Database password */
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'password');

/** Database hostname */
define('DB_HOST', getenv('DB_HOST') ?: 'db');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', getenv('DB_COLLATE') ?: '');

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
/* define('AUTH_KEY', '0hZ`)A*t:H|VQ?TnA#n- yu,twTW?)+-=8{eCkNxdXc)yEH#U=7k7+GZeEEl,A{.'); */
/* define('SECURE_AUTH_KEY', '{AlT+$5dBW`-+V6EQGU=?<rZbc}#?{pWr~[!u~t6~/<bO3_4{1jBPelwGeQ1_&-U'); */
/* define('LOGGED_IN_KEY', 'P0@=Zu0EIca60fKtAPut|%iFnO)dX#H6&~DUKYZrcvFzQ^Rk&i%sLHy&b0)G)Jqv'); */
/* define('NONCE_KEY', '}96#$CV8GEFp<~vMxVrQ=^t-D#LwHjg}De-h WY/PNaF>;+}@N=KeEfflImzVl6}'); */
/* define('AUTH_SALT', 'M/r]=*AqWa CaCl>1$ASx9yV|-B:!Ixt|ZsP$?4eT ti<>$_ccmj>LmM8DvMXkLu'); */
/* define('SECURE_AUTH_SALT', 'nCmA}<40]kH,oC(di~;l$_k%^K]fFG~:gZMh%>-d&}op6Xn/~k!8(^]qCQz31%a5'); */
/* define('LOGGED_IN_SALT', '){ rl:dD.^2c}k5>VjL5k_rY8j[d`%i5~vuv~dI()CI?@r.1jv:4~4g8^ZrsPZXf'); */
/* define('NONCE_SALT', 'W :?wI!x{A<5ay$5O3(:)mWwmdr.P3eaPQFXU[B.]<|M1`7wUL))2mN/aw`x;@zs'); */

define('AUTH_KEY', getenv('AUTH_KEY') ?: 'fallback-dev-key');
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY') ?: 'fallback-dev-key');
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY') ?: 'fallback-dev-key');
define('NONCE_KEY', getenv('NONCE_KEY') ?: 'fallback-dev-key');
define('AUTH_SALT', getenv('AUTH_SALT') ?: 'fallback-dev-key');
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'fallback-dev-key');
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT') ?: 'fallback-dev-key');
define('NONCE_SALT', getenv('NONCE_SALT') ?: 'fallback-dev-key');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__.'/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH.'wp-settings.php';
