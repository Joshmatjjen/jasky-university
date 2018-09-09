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

if(file_exists(dirname(__FILE__) . '/local.php')){
	// Local DataBase Service

	/** The name of the database for WordPress */
	define('DB_NAME', 'jasky_university');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'Chelsea1998');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');
}else{
	// Live DataBase Service

	/** The name of the database for WordPress */
	define('DB_NAME', 'joshmatp_universitydata');

	/** MySQL database username */
	define('DB_USER', 'joshmatp_jasky');

	/** MySQL database password */
	define('DB_PASSWORD', 'Jasky2017');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');
}


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY', ';QOMZ-?8vx@^YUQoPa+1a#Hw>~UNH &vqQYooj-#!MO,Mll)RZ*|Od0;xG WdE`z');
define('SECURE_AUTH_KEY', ' m(U/d]^_)z)oCgcb.]ztw:^.sgZ]smB; QTi!sd++Q-dOJB5fCJj9po:Q;fTqcW');
define('LOGGED_IN_KEY', '_*VNq/ps.OFg|-Y-~8<@F,:b#U`0y,Q<(mF/;Ja7~A>piO|4[J]iqkfeXCJ+$q{:');
define('NONCE_KEY', 'Sp$mKW)f$Q&6=a7Sg#AVU|GffG_/@z)pcCq`sXKfQE!O~5OhF$w/;j])wd~:G>s ');
define('AUTH_SALT', ';IPRQ5H+T;8GnFd0z;-@|^i{Vn 3{Wd91M9VUszei4hmYl;A/-Zc;s$e%4D]Sv.b');
define('SECURE_AUTH_SALT', 'WJIj;pPK,+/^^_-6}/4NT/3)uprlQ1A$W,_mJS?A%pxhX<&UP`- Uw_;k)cZ]5-,');
define('LOGGED_IN_SALT', 'i4a2EJS<G>l2Q;_jIVGM4j>3:0M)-j5<.fl4!Yc|1DrI+-;,QSn0Yz,vNsowTBm*');
define('NONCE_SALT', 'j?(Id-K@</l-%5[@e&|17(xv9)Ra-Y),J+<.uft,).v:zIiIW0%ei|]tZ<g]bEXE');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
