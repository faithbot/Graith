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
define('DB_NAME', 'wedding');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6*LBR|]$CSaT=W:&LY05~aajYr.wY7(%qhq7ji0*ntr!?B* 9+ZZT>Ohg5)+1igc');
define('SECURE_AUTH_KEY',  'NoXey3Vk<H(Ak>{ewvXNMVr3*le8Q6P)|j75<7u1m %lSp9oU;k@16oW?Ev>fmt ');
define('LOGGED_IN_KEY',    'bgP;qa_pqe$Cw;w[81fTW4PMeB7f6WP3`O*Z2g^mOhl2mXy5jmyNF/8K9WJ/aFbT');
define('NONCE_KEY',        'j(0K(jnPcw~UK?Ek=^;{czRwqEw-,LwX4/PV54l>esL~P >9F)Iknb+K0l=YV()Q');
define('AUTH_SALT',        '$a7559E!>T3zN)_3d;]/ffYyI~][R93T?k4NC,WmbFZd4Fu**5T{DR{J+}QxfKhF');
define('SECURE_AUTH_SALT', 'Xitl oXQ_j7ZwQ~6*oUCu$vMEaa[#WFN_nZ&&w=y5syigDqzoduv3NM;no^.}W/#');
define('LOGGED_IN_SALT',   'b3kgyzn99!UrDqFpWd2nT%X~nDg%6um2Q(`y! Miqvl&=Zjnb:%0od.,G<Pv-MQ]');
define('NONCE_SALT',       'H&hWrU({u<0Jz0vr(h9c?,3P>UBfi9~Cj`B-kw6ol.pS?@ln-ZMrPq:VU7tNkTq;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
