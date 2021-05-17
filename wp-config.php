<?php
define( 'WP_CACHE', true );
/** Enable W3 Total Cache */
 // Added by WP Rocket

 // Added by WP Rocket
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
define('DB_NAME', 'socialme_onb');

/** MySQL database username */
define('DB_USER', 'socialme_v_admin');

/** MySQL database password */
define('DB_PASSWORD', 'RB23rpDX68QfJwg');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', true);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@Ay$+LII$|$Q{N1+Q^YoV!wR06fn|,:i-@y,dXTo27wm3>@wNOR|@2@!EbHNO-Rj');
define('SECURE_AUTH_KEY',  '&%wZmnda>{E(ITFe .YvG.<EMM!tjw{A&|5X(}z6TP|=G!s&puLhG!]7+Oy6(ifv');
define('LOGGED_IN_KEY',    'nkqUiyfo|!EzT4Y^SU$QBz[+b+7p[!r=A#.6]gttu?HVm4SJzSZ-D@?y*_n7RwL<');
define('NONCE_KEY',        'aH@w (:[^~}q3x?;2J/u-J74WiBxEz}C6M7Cv(c1>{+,gUnN^{l?`V]Lbn,RGs^{');
define('AUTH_SALT',        '+oXc<=Ukgde`Uswimn9C@UHM-vH!%ho+.0n-CC}!~O6yF72 lan/bbtvI/ Yp|;K');
define('SECURE_AUTH_SALT', 'gPNKXcs7D;i`B&kKf~pJ!Hl.f6!q!r(/:z&ciejcE2Xr%SZgYp`~NH{>TdNd#MjQ');
define('LOGGED_IN_SALT',   ']`{+uP.V-i9Y^4.zw&tc<m)4Z*x%.DWg57oK0~MBl+^#-,paohHROV2&Bp}i`Kc^');
define('NONCE_SALT',       '<<UWuY6^gf)~2xAGLAk08o-l9;`6_kgd&u+}d6FDcgBaVrY!-1M|PY]$kcCWc s+');

/**
 * Other customizations.
 */
//define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
#define( 'UPLOADS', '/home/socialme/onlinenewsbuzz.com/wp-content/uploads' );
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Disallow file edit














































