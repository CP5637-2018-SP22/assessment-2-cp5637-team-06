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
define('DB_NAME', 'DBbrightsmile');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         'aP] pCc.1fb~5$FZPL>cuP)`ys)MLK; ]R6^L4p;K8>S@RNm2`G4ki@D+@zyL{xT');
define('SECURE_AUTH_KEY',  'U-Jt[<%x);Xt&b15gohBi)~6X}0cV&NTE}6Y HuYRcUZ^gt5I`Wmv1,|Tm6*Sig1');
define('LOGGED_IN_KEY',    'rQpy[o|zSmG5(<Gh$=@{M2unf6RSQp7V`WUj-?Zl7|jOm/2U=cnnD)H4EzN9V$x_');
define('NONCE_KEY',        '4s*-GKl=*`[<unWf2u1~([6c&;-1~+1:RB.Yv]_>4]bc-Eq*X~xZBo 2DWh>si.l');
define('AUTH_SALT',        '%[<K4)h2Xp/PJO^=nMaPXBak8al^|@D< IINPh#k?=D?UIKpoa@ IZ?x[HJZ%X{&');
define('SECURE_AUTH_SALT', 'K11z38`E;j5%[{;30K_P>,125*vuDmA$GYQZ$t^ P3k%*7IL|~w,Bde>HN(0US.+');
define('LOGGED_IN_SALT',   '%Z]gs^a9QV`ea_punsXA3vZOKZMZ8 :x//niR]/?tzsIKc9CXwcfXNoH;O^xk[&!');
define('NONCE_SALT',       't48*)|3d-&PA[RAoNdKazeT*KftX PX.![l[/?3($-I1uT Hxxp*>1<Q%EPi+^Hk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'DBbs_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
