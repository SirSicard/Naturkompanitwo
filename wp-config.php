<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', "grupp" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

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
define( 'AUTH_KEY',         '91.^FjZ)<[v 1ZHD9m:St2/t1YFWZ#fnGkf#w<GgS*4YK0 C5)$8,XUFvS$3=OL2' );
define( 'SECURE_AUTH_KEY',  'bI)&5-p>PsNGdV|IL;&Y/;(`rYCPUKasFWywobIm=-}vDKf8[`iJ^M~Q3|64]P^>' );
define( 'LOGGED_IN_KEY',    '8v/8pE$nJxCAS6(h(t7&j=v#XJGktcG{4r%b)cNC@.m/w>kPp%Xf{=;,v24jHH--' );
define( 'NONCE_KEY',        ' $J<4tAzn`e.H_&ncKX0+2A{8e,!%]%h<r+*J.a!jfu,F@wxrbmhAQqp!ipn_D5~' );
define( 'AUTH_SALT',        'kQELKG9`/4KP1t7uuIRwsa}#)Jm08c-$GUfIb|Eq%^ eP~Zgk9zz9Wl##gV0*!-p' );
define( 'SECURE_AUTH_SALT', 'Qt$*YTEdM,:> hdaStTWgg|G~/syV{8]puv!tYABSndotXz,%o!O6$`0[([SeB?$' );
define( 'LOGGED_IN_SALT',   'Y=xu<uhaOzx<SP}vYNal.G7W{RK3H~EpJo#$id)wJb)IBPN=Qs#b[r4~Hcti+9YN' );
define( 'NONCE_SALT',       'NSMtn){`LHRI2{%JVy[|)-;F)I]Q%MW6$p8lw:RgM`W?n[g|, kwhf8nv*E?goff' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

