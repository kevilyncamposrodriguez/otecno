<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u597909347_lPJhF' );

/** Database username */
define( 'DB_USER', 'u597909347_4Gj9O' );

/** Database password */
define( 'DB_PASSWORD', '07cn9sXmt9' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',          '`uiLE !ky~N~?*u{lbH[%*Krd`A<3mC3 UdLg[8p4K[@me7K0B^Y.ZBj `?JZmZ|' );
define( 'SECURE_AUTH_KEY',   'LD {?d@M:[by}`Glslg4[FKXsmT*0jrrxlPw[H2hhCK.]8xM6lCBBR3_V#iw*)4R' );
define( 'LOGGED_IN_KEY',     'g}q(*/8h8fZZ8N5WFg]Zmm}.Ht`V~K$r58/kTj;x?diq~/u.N1J?5hwc;>lQ?Xo[' );
define( 'NONCE_KEY',         '(W@ <cC3W&2uWcDK$aK})ING%Q#|!)=h#{#_+4HM|Uixc^[5eA@t5nqbL)~ Yi~+' );
define( 'AUTH_SALT',         'ex=)Vhu87y0{)H8Ui_0LdZ9kEEAx|YLwb3%@,3XRX{<N=4:/B|4dP(^Tv#TAwa=g' );
define( 'SECURE_AUTH_SALT',  ':5]R{T;2s45uFr}(Y:-JL$1p:iYh0#d%oAPGZ;@mNOeij+@MY/C`pZC+wf< D-!q' );
define( 'LOGGED_IN_SALT',    'GTC[*Mz*if0X7mVYKNWY)M!)O2@Y2jX:nGLYL2aQ[.]uB;<C$P>Oyu#RlKS~3?[6' );
define( 'NONCE_SALT',        'Mw+dN%d_7l8Eh?4(*%9;D8hz-5T@W~=}_-rd}FJFhU2{*ct+1d-zP5,6O=[9+xK%' );
define( 'WP_CACHE_KEY_SALT', 'rYHc&O!+AZD+K>U:$gdFKN.*NqZP^XN?Qes7<118cc3Ao4,::H|66fB`W3,P}{(C' );


/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
