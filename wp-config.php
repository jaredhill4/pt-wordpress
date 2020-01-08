<?php
/** Load Composer’s autoloader */
require __DIR__ . '/vendor/autoload.php';

/** @var string Directory containing all of the site's files */
$root_dir = dirname(__FILE__);

/** Use Dotenv to set required environment variables and load .env file in root */
$dotenv = Dotenv\Dotenv::create($root_dir);
$dotenv->load();

/** Environment */
define('WP_ENV', getenv('WP_ENV'));

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

// TODO: [ADM-32] Figure out why server auth isn't working on review
/** Authentication needed for review environment */
$authenticated = FALSE;
$trusted_ips = array('10.1.80', '10.2.80', '192.168.1', '97.77.8.162');
$logins = [
	[
		'u' => 'wlion',
		'p' => 'm3Y3_dev.21'
	],
	[
		'u' => 'wordpress',
		'p' => 'review'
	]
];
if (!(bool) getenv('REQUIRE_SERVER_AUTH')) {
	$authenticated = TRUE;
} elseif (in_array(substr($_SERVER['REMOTE_ADDR'], 0, strrpos($_SERVER['REMOTE_ADDR'], '.')), $trusted_ips)) {
	$authenticated = TRUE;
} elseif (in_array($_SERVER['REMOTE_ADDR'], $trusted_ips)) {
	$authenticated = TRUE;
} elseif (isset($_SERVER['PHP_AUTH_USER']) and isset($_SERVER['PHP_AUTH_PW'])) {
	foreach ($logins as $login) {
		if ($_SERVER['PHP_AUTH_USER'] === $login['u'] and $_SERVER['PHP_AUTH_PW'] === $login['p']) {
			$authenticated = TRUE;
			break;
		}
	}
}
if (!$authenticated) {
	header('WWW-Authenticate: Basic realm="Authentication Required"');
	header('HTTP/1.0 401 Unauthorized');
	die('Access Denied');
}

/** MySQL settings - You can get this info from your web host */
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', getenv('DB_CHARSET'));

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', getenv('DB_COLLATE'));

/**
 * WordPress URL.
 *
 * Programmatically detect the site environment and define the URL
 * so the install works in development and on production.
 */
$site_url = 'http' . (((!empty($_SERVER['HTTPS']) and $_SERVER['HTTPS'] !== 'off') or $_SERVER['SERVER_PORT'] == 443) ? 's' : '') . '://' . $_SERVER['SERVER_NAME'];
define('WP_SITEURL', $site_url . '/wp');
define('WP_HOME',    $site_url);

// Move the location of the content dir
define('WP_CONTENT_DIR', $root_dir . '/app');
define('WP_CONTENT_URL', $site_url . '/app');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('NONCE_KEY'));
define('AUTH_SALT',        getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('NONCE_SALT'));
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wlion_wp_';

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
define('WP_DEBUG', getenv('WP_DEBUG'));

// Limit revisions to three per post
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS'));

// Disable file editing in WordPress admin
define('DISALLOW_FILE_EDIT', getenv('DISALLOW_FILE_EDIT'));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', $root_dir . '/wp/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
