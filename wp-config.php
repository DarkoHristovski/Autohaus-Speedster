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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'autohaus' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'xW$h2QBnCyr0rF3y^ki=KG_U{juQqr#/YJP)g6+_(wYb+N/q)M$Xa?H;+qtZr~u&' );
define( 'SECURE_AUTH_KEY',  '(&M.tImd,N/#;(6^6&}PW[MH&LF3UH:k1_?3#Kf{XtD(Vb|~E)?`<B$rTeW0P@QU' );
define( 'LOGGED_IN_KEY',    'zRpR_{)U>!t=SK]N7F=aqoI<_RXKy]qF90G?5mbCoLDA2-w@T?&x~>W-x`ZL/ClB' );
define( 'NONCE_KEY',        'iD[Zy?:,iwdYIthNTB*^Lm(I({zfEaAv|8[F#:qV#Y25ut`{,WO[k{`HEE2aq#0$' );
define( 'AUTH_SALT',        'bLV,+@/vf0|QL1p{T?,UrYC3RE2`C$-nj*}uJv5~x;NR}ko}@:+Fez6];e/Fn,qO' );
define( 'SECURE_AUTH_SALT', 'J$Y#]kP0Ko!WD:q{#Wg`|HPJ%%,j570x%~diUO`(dgTUh R|uGX]mgr@Ltw^*OH`' );
define( 'LOGGED_IN_SALT',   '~TDf,6uX_qcSn:9<b?`on_Q-Lwv9O=.^`}%6V[*W}dX{|*.W2[ELp^tso3_VnV{C' );
define( 'NONCE_SALT',       'S^C|z4g 1],C?<X}9. .Nl(u-TX6brQw&/?hv:W#0A<Q Oq5arr$|2:sZ9P%*:vD' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
