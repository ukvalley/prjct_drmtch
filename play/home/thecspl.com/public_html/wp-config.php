<?php
define('WP_CACHE', true);
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '4MhIbOsYeIaM5w' );

/** MySQL database username */
define( 'DB_USER', '4MhIbOsYeIaM5w' );

/** MySQL database password */
define( 'DB_PASSWORD', '5sQh8mTdGbRcMc' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Y&j*h{w6HoYJ5;4.|E%v+c/1#oGU&bph#OF<U|5<21J@VG{|d9ZaB1$ZQ~s6!H%f' );
define( 'SECURE_AUTH_KEY',   'BB36?0CkJ:C3pO6jyA6e+9<UNDM0`hbF<cZ`*Z3Km,)0q^!@~>&stb0l8bfAtf8M' );
define( 'LOGGED_IN_KEY',     'c~H.][qTi_n|j~JLgTL3sV,@4cgh__/g+:lh|FGh_GY#Go,*Vy:T!TSJKHuf8[9 ' );
define( 'NONCE_KEY',         'Py5c=v`EkqO9 93HpNw@)UVyRu17uG3grLpm<hMWVGmI56d|ParNSOnG$=uTY2Ui' );
define( 'AUTH_SALT',         ']!@^@><p4s}h2Km+7~o/I:wbOtN`^3)S_MzO[=<O0W%3Xz)b$GjBisy!_t=rDz[0' );
define( 'SECURE_AUTH_SALT',  'xCBL[$g3cAHcb#Cf`_}<{~xC~q0BCkMeHSPS.#n9E)UT.Z>.o<b4=zugQ8D1ivO9' );
define( 'LOGGED_IN_SALT',    '<SGRN[zW;-:O=P|rU@!*$oqFM;R~,k##,LWZr$bnhubFC5;PHDDJ[tr/_^UOy0tM' );
define( 'NONCE_SALT',        'nX`@~-@yf$A>Eg5(4[`^%9Gs[Ir#cj]y=)RY9-`pELkRJN4S[0+(jfOu]*^5P{*q' );
define( 'WP_CACHE_KEY_SALT', 'chVTIKSZ?KqFD)Lmq4}KXF;>U(<*9r>qopk_2I0tN;:kS?`x Y9`Xz~)*~R$4Oj7' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
