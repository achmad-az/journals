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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          ',;Jv=&Y#JBD{XlE81eCAZId_o<!f1;uGA$Y2es0K-Af,6*FK?A|(_?Nt^$G%e<!B' );
define( 'SECURE_AUTH_KEY',   'Qd9_&ygV2&Ll@-hciVt_-_|.xl$ F4cw__lz%3]xozF^N]@f2sa!=~#]Qf;KUf|v' );
define( 'LOGGED_IN_KEY',     'KNF/G+$bT A1(/lT0s&D@xs~ax=i#E(Jr9|y)Ke.3wMYlYy$KxWh=M,VA`y,J9)#' );
define( 'NONCE_KEY',         '2]1v^Xm5ro,MbVwgW*}}CcxB`cDHf3V5Pn8$hfRhaou}I3BAP_>!Id0Vt%_PpNAA' );
define( 'AUTH_SALT',         'vT#0Ai)$:Id}v9Y(DK|@ToZ6{&{7_zP|XX!4A9ecH8i#YJ/`Z%3M%gDy|u5>~52W' );
define( 'SECURE_AUTH_SALT',  'fu1+nNe;16<lSs3O+LTbG7a@vq+>MV;(ad(s x`Y[F:^He% Y5<A7Qn9/K?l[JbV' );
define( 'LOGGED_IN_SALT',    'gC Q.@c{,a6[V~x}9#CrG[1!DuH.&u!j@-h#FoaY&l{3ru[ysEdscs#OzX=|PSH!' );
define( 'NONCE_SALT',        '@XiwM;Tw0JUXp<E&eC>,4{A rT(WB!%Ax=iU5lWucfxrVaaPLb{*H^dtyFE7:WBV' );
define( 'WP_CACHE_KEY_SALT', 'oeaiZE+Ii4Gg5flZ]|^1v-y;Z2+(gqpO_}:o)h@7CkQ#&espDpga!Vu+E6F&oT:p' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
