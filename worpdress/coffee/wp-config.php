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
define('DB_NAME', 'coff');

/** MySQL database username */
define('DB_USER', 'alexander');

/** MySQL database password */
define('DB_PASSWORD', 'alexanderPassWP');

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
define('AUTH_KEY',         'y!+8$^iuE`zehda.tU^{XV;cc$Vq]5y-#)uPTvGn,e$7+LuamGaLGxnkv}y:@{~v');
define('SECURE_AUTH_KEY',  '&NyQ@;e+F1I8acS=hU)[P}v)JRo}6/gj7k@$<HV!yoMl-3DR4@^[ c1;c-)^Xo_%');
define('LOGGED_IN_KEY',    '~KPl*rSWQ(jeCI=s&`qtou)o]!~7.6k_7o@IW/A0OD#6SH SjhSz^P~@h{fh}Zk.');
define('NONCE_KEY',        'B-pR_;5``[,.Z>IDE8P+b{:$SO/S:H_):Ra?MTi0,xW 1-3[V:5fcLi}]ofgPKF ');
define('AUTH_SALT',        '0K$l$#.]RD|DD*G##0c@FUz%7q@{Ni8CYV&(F,i9tgUs-`zc,@.9X|y*I[.YG mj');
define('SECURE_AUTH_SALT', 'lb-Q=F=Fkm+f@1uYW*u<6:>a;#KY)zdYZ{dVLX-6>7]:>Ou1<m2X>}|V4pNkKh[L');
define('LOGGED_IN_SALT',   ')H~R`,Kbu$]-&R=(s/,{>fYhM Gzh+,6l5O3KV86e|dJj3aVF:PBpby_x6hidb7S');
define('NONCE_SALT',       '_zW2?$o,zz;DB`(AI&9I#K`ip `CEB_c*I{-8pOD&Ir8:x`{p%eA(ZU{;O]^VN==');

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

