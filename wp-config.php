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
define( 'DB_NAME', 'db_l&d_technology' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '5E@,%#-NZ8@%_(DtJ0dm!03TGDu?hxujPxGd4?^0`M|ahd<X35AgWV`D%?^&y(*&' );
define( 'SECURE_AUTH_KEY',  '1i~9;vb_g]bqUcdC!}W^inn@Lb!P5M1b@tTS= 9pZq^rSZU)3pAs9*rkH5P/K:X~' );
define( 'LOGGED_IN_KEY',    '*xTO)H,G zj1nt~>(V`2{7>Bw09.0cf)O~=%sQodnfF&[T;UGIczmd<Yw:CudqyD' );
define( 'NONCE_KEY',        'NtyT#ah_h8]mxV|G$]Glx-4Io//h|ERwq^s8b|sG_.,eXM/AbCxyqC)oJCCsv@dx' );
define( 'AUTH_SALT',        'CGpw`ZZ?)V0X{{c}2CJrSU^[E$QPgy|TsKj;PF~%=KurbhC:xh<3)Dba]F(~cBnW' );
define( 'SECURE_AUTH_SALT', '6hf^;~#Ah<.iTS9WQTV!E/kX#d3W2w RN5&4>`yC},2Q^pXe0c ,EEU.*pzA?G7%' );
define( 'LOGGED_IN_SALT',   'hMF~?hG4r@K$#?P94:7@ClL1~dnAQ_yt+et,K7^:_K^>3PB*G[$g3HPsj)I|Hxw,' );
define( 'NONCE_SALT',       '@Vw#%=F#TtEZ[Qhh~sFPzfoEvF7$&#=0-VD?AQY@s4)ws[7M_?BwTf8SjewlY2R0' );

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


/* Desactivar el uso de FTP para actualizar Plugins y Themes en WordPress */
define('FS_METHOD','direct');