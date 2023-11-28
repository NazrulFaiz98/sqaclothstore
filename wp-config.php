<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'clothstore' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '2)5n10$)i?KWg[(+}y(`1dZne_y[iW/<I3Zkm<]64^+]dzZ`~3#eJ5A%3;[Hs%wk' );
define( 'SECURE_AUTH_KEY',  '_Pfm-EYj-;~TdrJ}Wwq!3&=sH]jfe&/kPCfI8X|+pPvLUA5y|+71 !c,ObK|y?do' );
define( 'LOGGED_IN_KEY',    '^~Nn;dq{+TJRPf4R/DUi1h&dxOUnR5h-yK16K/$$7(E0o:d~0.; j1 |b$;^)!$e' );
define( 'NONCE_KEY',        '|_HswY~EVP8^45|b)L~sFU.*NKf]U#c@={ZZ&K!9UZ%L}Myz>tE6:=#?gbBIq}/?' );
define( 'AUTH_SALT',        'ay[%nWJdRU,I6v|qEGRlwF8?U?+yk(vwzdBw)Hl;lH9u-yN9GjyE0QxzJ !qq)MU' );
define( 'SECURE_AUTH_SALT', '<i,j,[CR@D!j&N694ZYShv2BM_z.iz2qX{xAWhifnj&%b{6OHYp`_jFhV]#721,_' );
define( 'LOGGED_IN_SALT',   'q~gy 2RMq+wG5UAP1YbAmI0AEfLOI4D9pO&<r]Vv&_}&P:$;2F=lpKI>0=2K.HuU' );
define( 'NONCE_SALT',       '8D#Alc?N!zA=/;WX&#0Xak}VjsQ/i`;r6Qg{y7Nt/]QJH[_d7z-aR_d|r8BNrx^;' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
