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
define('DB_NAME', 'corona_19');

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
define('AUTH_KEY',         '@*qy9zpxt-%42d(Gu`ghkLy.<,`dy#:bc@_==;*fYl rZ5o6Zrd?nJkC>R2g2Lvk');
define('SECURE_AUTH_KEY',  '`!l.9W4@*(;wNJ>!f.&ZsE.b6bk=aBEjA|eNf|`^:U0Q4^9)x,S]fr?j>bgpnfiJ');
define('LOGGED_IN_KEY',    'br=Hc00KLt-qxK6L(SdnX~JH?FO-Y{|I_[|c~A 3VY4.=::Y=`lA2(Ng)TpZ.dJk');
define('NONCE_KEY',        'bUjhwDF`GQZD]B~!3A.]S+=7ZAeN`;;g<OsJo~Uh{Y3OXKDq3(|K4u:u35yh2R*0');
define('AUTH_SALT',        'Z%@]~pGx_M`rskA,1]@m_~^,$c#5YI9wCZcL((t8awOppQ($7OojkF6jgg=y0{M5');
define('SECURE_AUTH_SALT', 'f+X8lCpa~pW!db;Jlza::|)RSSPQA/_ZTxZxM9-mNz,4@9AK$zZ5fW?/7PV-_&A*');
define('LOGGED_IN_SALT',   '{_-~C6xeAUWR(,o>}iA^/A41^22<,HQ]+N{.vML-9w4fVYYpW0UCr7Gs?p?PfM3i');
define('NONCE_SALT',       '6M/!XJL>kU o8$/2MIN=Il~$!|IxEykfHXm[kvG9I[doT5AK|I[eFF G#{TnTKGK');

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
