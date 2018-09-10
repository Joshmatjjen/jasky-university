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
	define('DB_NAME', 'jaskyu61_universitydata');

	/** MySQL database username */
	define('DB_USER', 'jaskyu61_wp702');

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
define('AUTH_KEY', 'h<(sTR_<IbPWi+!|/+v=w9Q9,psfo2bSe^oVlYmEW&5NJ*U|}#ty01<6l~+JeSN)');
define('SECURE_AUTH_KEY', 'h;0v8bi upbOrI|mM*4mP?|f)>0S5Iv&s^?48[c-*$|1P2tO3Z286&P@+$W*({d>');
define('LOGGED_IN_KEY', 'I-vcNiF.D-^=hQxZJMxg@^,<w[R-#~aBemRA|-IC1J90IQnsvjQr{Et&_-qV>~Ou');
define('NONCE_KEY', 'W5EPo|JKO]ZgLavT,/[sy3yKh^d6W:tUduTX3$HHvKw-90[og{^YOI 9Pkd>F$;U');
define('AUTH_SALT', 'D:$tgkl0g5G>W=YS+FO/=r+dR0IJp+y{XmnOFGtD)W-hl4cSZ&Qj!Q4w3xLzfDCJ');
define('SECURE_AUTH_SALT', 'iT3aS5_|#GCm:Hz>`ht<>!EJ@C3t`G~g~N#$$OqQOdy]EE1kNu/fM-C7^[+D RHJ');
define('LOGGED_IN_SALT', 'xFhsz82bPgj59CMqwJ&[#/Q->/D)VqiUZ?_>vr$ab.LRaio}L}m!XL=Q pSfn|pP');
define('NONCE_SALT', 'hI-~f5{{B+XZ,*MFV5BK-<zFawRub11[hWK-`@k:v3YRrs`k#8MjQ#@CcH;89gC$');

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
