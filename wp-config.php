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
define( 'DB_NAME', 'm0T7VjS6iY3v6W' );

/** MySQL database username */
define( 'DB_USER', 'm0T7VjS6iY3v6W' );

/** MySQL database password */
define( 'DB_PASSWORD', 'U9Mh5H9B4Q7lP5' );

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
define( 'AUTH_KEY',          ']o9/|*hC,^(K>8VEGhcVj23[q4#=N1uEZllDo+g%Jfb)mt#{)@Mz#=w((2eKf)Ty' );
define( 'SECURE_AUTH_KEY',   'V-aUY*C*aI={G]OmI3-AX[F!>rl++Oir/qC`NjI6B=`/txXPac!/G%gc}h-!>r4b' );
define( 'LOGGED_IN_KEY',     'v}9TQz|G~QoQ471[f2ZMTgLm/9<0?veCeeq)i`:;0P_Jy2$gQ;$=[VUr,MXe(Mf(' );
define( 'NONCE_KEY',         '_1o4!51,J`x#AdeMsqX2P5Ctt suQ6+aT`t!ewoRO=|gKeX}agkLJT]/JVC6irW?' );
define( 'AUTH_SALT',         ':u)]voYE@gmBSykXCF:c!k$w*^Jf$L:Cy9&h IN/7:vYf1,^sFO2<~}<(~%4#WgY' );
define( 'SECURE_AUTH_SALT',  '.Q_tMX:2Q.pv3TuB!b)M&#pfJ4?GagGuTe7LQ1[VqufsH{fKkhe]q:zYl!my4.Vc' );
define( 'LOGGED_IN_SALT',    'v>rdB-?hByJ,2W6FK^0N(HEvw!ViB9vu_noCLDbkbu*]<.<JYzdPykZSp7|odNVI' );
define( 'NONCE_SALT',        ';$LpXmwR@+*5Et6eno1f[iXRSCMb7H6{FI-MjlcS@`89&[^DS-RtCi0&m,aM-),;' );
define( 'WP_CACHE_KEY_SALT', 'J|ZEc;}aA8*fIRxHacY!l9H}Tq=3UwXM>YV.6!%]U{dxB-!F@,^=1kJ5nwaa`V)(' );

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
