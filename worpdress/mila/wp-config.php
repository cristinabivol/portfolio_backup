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
define('DB_NAME', 'mila');

/** MySQL database username */
define('DB_USER', 'milawordpress');

/** MySQL database password */
define('DB_PASSWORD', 'MilaWordpressP@ssword!');

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
define('AUTH_KEY',         'K{[mRbq#ehpSefT3%Jw !tGsK_6lAA*PpC:``G0WgZ(4=S@Rr)iyXTT=e]/}~!^`');
define('SECURE_AUTH_KEY',  'O+7=(CKs!#/{T2CIHZ5| rn`RbFEwa:=LJjeI8$(ftx<kZHz73;} ^Q5NnAt~zul');
define('LOGGED_IN_KEY',    '1zkJ~Ic4ga}l+1|0M(If6<_G*m*):S#X.OHZ)7WJ{.Ojt!(=,o j@w:KMJY_lu;e');
define('NONCE_KEY',        'wq;#`T9hRv!i=sv9>,f;42ZuAXqG rT2Sk51/D5,driNN;D/=oo3jYDs +$.$8;N');
define('AUTH_SALT',        'z|SID)bo8Lj@[.VY?<bZM-KF1pqSjC+Y^A9t?riK{)rmF.8I4ld(v-5g^IoD8|}m');
define('SECURE_AUTH_SALT', 'pLG_;M-Hu3GhM@X,OoGfhqhmibu@w5Av2puc2Rt2?3P?b=kvf[DM#nQWU3mPshDN');
define('LOGGED_IN_SALT',   'pF(5<.Dr4-U]sogQ1_, ~E%toid=LH K>~-vT-=dXShFd?{x+M4x(L~(YS:{*t6K');
define('NONCE_SALT',       't~lNQhWma:kHTX>Iz_FrZI(3dP9d{#a}-{Dp?{Rf^PP:gO/{pk?y21dO|s+.k7ZS');

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

