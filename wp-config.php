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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'workshopcandybar' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ')6;RF,tF@:g=6aovvt{`Lg2-:*/p[:3s2wn4.oVgtPwOXOny>_$~AOyr_[>ex6Hi' );
define( 'SECURE_AUTH_KEY',  '-t3qYj:+I6%;mjcAI|MH?_q]u_~NV@}UBGe#Eyi1zh3(fp!r9/?v]-,w2[0:a/7X' );
define( 'LOGGED_IN_KEY',    'h-H>UZE 4)@0IZLb(fN$,9CiNX KG]Op*rR11Fq+4=f,&V;qs>5WgwJ4g9!:e9ND' );
define( 'NONCE_KEY',        '5m-SV0)lVj7i,.}adji|-m`z|5Wer#rc@P,j$]6[v!!bL2!Jm0vFTJ;Dz8UI//&:' );
define( 'AUTH_SALT',        '`GdzRr)J]2=j^g=%$B89`2%1=IsJzV}P;wPvPQB~B~D]srC$hAWz}QlAQgY$7;PS' );
define( 'SECURE_AUTH_SALT', 'y^kRT_OmfqSi1)`y?Hza6n`0okF{0IKSkMu@cRcrOOg 842*fQ!!Y2uMDBq-P[70' );
define( 'LOGGED_IN_SALT',   'Ck)XBikD)K4`eCZ~OdTzt;IYh5X~08UQs!WUdrF>H+9~:aFspe`h0XjOSUie5AxX' );
define( 'NONCE_SALT',       'zR4cO1M5k6<Mm-JM5 PO[q,S xThL)Taj#|K1y3Ij?J@&D6~V*!ucAkSt~,]qX}o' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
