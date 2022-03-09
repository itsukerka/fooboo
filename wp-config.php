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
define('DB_NAME', 'woocommerce.mediaz.infob0fb4a');

/** MySQL database username */
define('DB_USER', 'u148ab');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '2AQ(z@wpanyOQksC^!xha8&wuqiA!c14ws1mBOXQUjN*J52P(Oco(C#1ApG@h2La');
define('SECURE_AUTH_KEY',  'ti4oS1i3ZTV(XzFc5X2CRh!k)weju&aszGxZPt(!Tz9QqF%o)A9qPg7K71CPSZB!');
define('LOGGED_IN_KEY',    'tbAAv^!U2nYKej291sAlX!bPABG!(D7S2v73kzLf6KB@06N5TVxG(s#D@O@KIsAw');
define('NONCE_KEY',        '2XgkevDbf5HC)smUMv^WalceM#ds5VWKPkTc0Lm*0FwgDQAf)GTT*2r&X35BOjA6');
define('AUTH_SALT',        'm(Oe9jtVIiYdg#v^h#ecJZ36aIg*V2&CsLC&O*215VCp6c^NH5^TlMpL4!#D7833');
define('SECURE_AUTH_SALT', 'k#eWo%0nhsI5nkqKsu(Kef&OYYS7MsGu4HXHN43D8XyR36p%!G1P74dONJ%!SnKC');
define('LOGGED_IN_SALT',   'a!LdU6vZu(@4oUWq^By#GgRfO(Kc3fWufAnCyW%c2OBpFQTg5u4ds%nH4PyNX!Rt');
define('NONCE_SALT',       '@9d(9uYTWAx%UcEdIcf&5r2z!w!#OwY#PpZqNN#vkdIa8dTuUkB*ST9rkc#r)qmK');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
