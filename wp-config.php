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
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '&*)U]5p3:xNdYWY(!Qhu;Qs8/MBF<g/fG; K=2k-o%M/($J)fBDv;hU>.qW>%$ZS' );
define( 'SECURE_AUTH_KEY',  '&|V!Ad~^}]f=.?uOJG~tU^/bj`,yaq=HHaA_kpdQuOK,nLhk76Q$hbX02[01V+kY' );
define( 'LOGGED_IN_KEY',    ')z*|x6H@T/|@1icxzB7c{2p1*NdZgby_nI;?Jh/]:#3%,`n@w)}< PlQ5dlkHF/N' );
define( 'NONCE_KEY',        '=#v=-+~wCM9+cpCl+f_Zb6oHe9;P[-Y<f`5eUUp+eBeZODh7_5ON<92}x9~pO7Fi' );
define( 'AUTH_SALT',        '{J^HeZM<WCk>cwOVy(3)<},h]a_Vu3#S n!7=QmHZJDiWXN|-dVwd@iw,TVL^YJ;' );
define( 'SECURE_AUTH_SALT', 'ztd92kxP#%qIhZqng2U+}Kv-}|Nq^(W&tsS Fz1tulD#}W9C_r4Y&YV}mBk)#8u/' );
define( 'LOGGED_IN_SALT',   'tU!tyUIwGu>_0S%V!4>-?:oO^38X@tNAQUgJ6t.x/fj|LVn!S@,Y=`~Bj,>92N 0' );
define( 'NONCE_SALT',       '@<qElh,UCR0UUZP/NS8k0@K5|]F!jlH:h9ZVn?YRM8Y{L9?Kx1MwbaG4Cj(MdM!n' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
