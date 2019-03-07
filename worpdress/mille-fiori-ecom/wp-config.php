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
define('DB_NAME', 'millefioriecom');

/** MySQL database username */
define('DB_USER', 'mfecomwordpress');

/** MySQL database password */
define('DB_PASSWORD', '123millefioriPass');

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
define('AUTH_KEY',         'RDM?U]a-8v]e+g2z8lQYP~PMyiV6Bl<i0F9RzybB8Dm5n0[Z*>LcMDr f[EVD/g<');
define('SECURE_AUTH_KEY',  'y!]&utJqT2f}lX1&pXTDRAes)#VFg1NqmyeBN1 Z1VUi??:bR- r(hi;sw-Mp6{I');
define('LOGGED_IN_KEY',    'oZK0Ookeu~&B9aee=J>,4j}C3/vsxSu4)wZqu@Jc[oQn(|2`T77Qs5s6o&RL!M7#');
define('NONCE_KEY',        'f;=f-t`yJXH6QD&c5Hlxd1Oo4;r!gs#{?P5v6^,kmJsU@rYdA3?zCYL.Y?*/-u,0');
define('AUTH_SALT',        'm&-+i(*?NN`@I(C6!`r~<k2V@B).u!%ppt_58p(8p$nWL8k~n91AjMCUK,->bcN7');
define('SECURE_AUTH_SALT', 'l*S?IwDI!mFZDqwOB]!`:*M]GDiC~1y@? F~}eJl`NoVMG_$vp^fyD0{SQGRx}TA');
define('LOGGED_IN_SALT',   '99.pF}zk_Lo :@Aik7F0[qoBRvk5,G;<FP?%rkZN_I. 9KHUmI0YCP1<{@?(P%B;');
define('NONCE_SALT',       'L()VL3+qhpSQFw?OxFmrlrdlJ@&=/#Avo63p,~,BltACUW$xrJnLUf7kV5jr0|^)');

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

