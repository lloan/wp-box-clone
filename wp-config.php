<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'vagrant' );

/** MySQL database password */
define( 'DB_PASSWORD', 'vagrant' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/j$*I%{_Zftmahm:S*6479zw etoa^5r+Mh]KMf0O-4X7Wc@J.#NGT8C+hi8u)@8');
define('SECURE_AUTH_KEY',  '|XC^ZhUtE-b`~{>-[z:k;0sBxO.E|&~/X:68I&)_iZSX,+iL,kNR}5el];v%(=n3');
define('LOGGED_IN_KEY',    'Uo7Y2pCX|4cqru/<{8^+o>cHq|/Y+xU#+_ZfJx>-J~>w)=KrDkA}z?qQoZG,}kT+');
define('NONCE_KEY',        '$(&H)M Jo02+oOZEs^$16*.zx!u-g257SY73>$$]=]}oYFt%(OHO,yz)k08+P}lW');
define('AUTH_SALT',        'c[kO+*Cc+~H.SRqV9`y!D1Wd}7_{*|-FJ!.ko8}DD1eMkoegm-ksQ:8{gV%8xA?&');
define('SECURE_AUTH_SALT', 'Our~<9$p^f$;*XGl|f|`t?JT|j};G{=3g-XhuUbQq#MD57v>Ktp91XD`Nh|4&gO:');
define('LOGGED_IN_SALT',   'MEf6ihZAE-n N@03|,+-1xtD8eE$lYXC>kcMJ;QG?Q /MGj3?y2k>Ij|NN7|AvU;');
define('NONCE_SALT',       '%o|dZW=Fs8Ns~a<O+e4U9ldAEY[tv3x73W0<T/r/s|C-^z^/Fj:-S>})exp%(Hx ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */ 
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define( 'WP_MEMORY_LIMIT', '4096M' );
define( 'FS_METHOD', 'direct' );
define( 'ENFORCE_GZIP', 'true' ); 

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
