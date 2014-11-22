<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'skiclub');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '2B4Nh50dm>ut-q>(KERM^O[v]rC{fQJd>f-1~,vX/e?G@km 20C3-Y4}X`ajP5`9');
define('SECURE_AUTH_KEY',  '&/i&lOBHXc!%sA!~lz_V4hyG^j&xIBU7|k+b$Q>T41!Qm_lRJSRhP0;&j0V3Q{cp');
define('LOGGED_IN_KEY',    '=RZnJN67bP)ip-;qqY2,fzm-_1dY+TWHGG,^PJx8SDe{]|  9ys*V0vyqOz/oUYc');
define('NONCE_KEY',        'jgM9nD=ORa_2MMxmo1g(x_uy#yS}hATR+N>E+5AbtrFX:aSG)1#^X05KYUry:S$f');
define('AUTH_SALT',        'SxW{+PxGbOpS41Jlu74.x4-3bCZuM5!`^G}|#+i&|di4Inx3P[OU|am-h|mJz5{M');
define('SECURE_AUTH_SALT', '}MhPB`Th|^{c_ 6L PMNtd-PiS}tOT@3n~|fR{>F328S|%JOXOjqfP27gGF.<TZ,');
define('LOGGED_IN_SALT',   'X+#y+|RmhX/|6i8o3081I^HyeG&RSm6;A+@8]-,S^LjmI@~Y!L;!bQEd<r#1bX&0');
define('NONCE_SALT',       '|-11iY!L-QSe8-NV|>gsU~Y+ad(XYRjvj61$h5dF-CN<tR-e$p3/iO<-;oL&`#pp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_2';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
if(is_admin()) {
	add_filter('filesystem_method', create_function('$a', 'return "direct";' ));
	define( 'FS_CHMOD_DIR', 0751 );
}
