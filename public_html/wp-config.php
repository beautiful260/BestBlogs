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
define( 'DB_NAME', 'u439280899_3fa0T' );

/** Database username */
define( 'DB_USER', 'u439280899_QOerS' );

/** Database password */
define( 'DB_PASSWORD', 'vkzRZ6rBP2' );

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
define( 'AUTH_KEY',          'u;jN1<DWdKy~jo8+9LP*_mn_p(]J&{TIP#~+s-|U).8tPfXpqy:`Q}Q^,U)t&g{q' );
define( 'SECURE_AUTH_KEY',   'Sc=g[$XKJ<(Bj{Or.]~fI5lQ*|!3d%h+@O`e$I3:RrXn*a,?TztjZWehdbm-nP6N' );
define( 'LOGGED_IN_KEY',     'JxyZ4+Dt)q:~p}}=BZLX_Z8}^lW,wJ-u#p*^k/2y7>(6v?_:,:qpupiVLCwhBA)c' );
define( 'NONCE_KEY',         ']vpa9caPZSb&4R_?%Zo@P ZIl%oJ+``>_;jkzx[LVvW?u6?O|xrsfZ^Y%nf6U3Sv' );
define( 'AUTH_SALT',         'vMSO0>vlIK(D4k5,):CeY/vICXni!WfhDoShR,KaXs+>(69R]3$LkfYuf9CKK>RP' );
define( 'SECURE_AUTH_SALT',  'e[v21KhFnCo WP&EWB|JbTC$Ci?#>#v/QIIuL8Js-z} rN&Bmoyt9sZeR+NA/!/*' );
define( 'LOGGED_IN_SALT',    '}D:<#q1rz(?4T4r55$cfc@#I+B_6/j%_HTuaF1N%qKzDarRZFDX@|[Lqey&)Yk6%' );
define( 'NONCE_SALT',        'vZeH? R|Gp$>5bK?g?#v,S<@D|9Km_x?xJ9_:/u4b%iOhTd0|#NwoS+u<5kGfFV?' );
define( 'WP_CACHE_KEY_SALT', 'iw+_V>& i%;-&Hu?O8>Ze0>FULSYJ>GP/QK&{]3rFK6`t)oq:$bgMg$B^FQlhGKZ' );


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
