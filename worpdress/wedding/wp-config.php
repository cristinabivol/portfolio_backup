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
define('DB_USER', 'wedwordpress');

/** MySQL database password */
define('DB_PASSWORD', '123weddingwordpressPass');

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
define('AUTH_KEY',         '.y-Xj_/P~/O)o~PJ6$|v.DV:8>KRb(5BM}0d5.fHe(|<!R;ySAkJ{B~Tbf=.tc.6');
define('SECURE_AUTH_KEY',  'x`oq|Cy8`ZBdY~6^#.d1AvjfzCw$<y(hHw51]5*U!^#8(&4%7~w-R.(wmBoJ=Vpc');
define('LOGGED_IN_KEY',    'dS&;1_:$Uc@!x>U</oBM}7sq2/A/Xd*5qYZI$|Y9Pp<y]gG?w$QXAvz2m$7gO;]G');
define('NONCE_KEY',        'Ar&R6[dvm|fG:zw8e)b^QY@pW+l.NU@fUb<F%jo{V`V.- 0&fxRsSrSs@hH-x+cF');
define('AUTH_SALT',        '01^yZ{:?Q+RQ@t/!Kk9OfdC8~`5,]QRmmnpVO1dl-3x#qg^r1kZ~K$wJgqu.C`*w');
define('SECURE_AUTH_SALT', 'M0DiSR}zcZ%l}d=<FW,R7dNYH?@4)]mb.AsR/D)fLNiE6P[xSKx}}qz+VbPN*4d*');
define('LOGGED_IN_SALT',   '}&22i)SO61u)Kq4~@F:UY>-.>PNtpL^y1K*`MOX@D^iHZhRWm4%oz}b+U#PU7tXc');
define('NONCE_SALT',       '_S;~w.X7[l=bzqP*{3Sib`mZFPwnA~E3QDq~q6B+7`e2->:Zd9F;nZtWZUbq_)9S');

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
