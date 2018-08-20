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
define('DB_NAME', 'id6781631_rtcamp');

/** MySQL database username */
define('DB_USER', 'id6781631_rtcamp');

/** MySQL database password */
define('DB_PASSWORD', 'rtcamp');

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
define('AUTH_KEY',         'DnWXtqgYHcL<C@GJ[)!^,nJcs5Mq{?*td>ldU@;#MpU%Bdw]cJ!F hs(}#1~Hf$i');
define('SECURE_AUTH_KEY',  '[;6N^@FbNm,.$O^X`/CkhO1f3{-TX0013fhJrzJjlXe@lWIgbwIt}(NZjxuf_6^!');
define('LOGGED_IN_KEY',    '|.Mp~BpxG6F-TMe4rpcv1Lm[9W#p5>b,PFt!*|Zw8o,*N4v($qo&P38p.s?T~Mkg');
define('NONCE_KEY',        'Fp7:l)};7)ayQgYAi(3@=pbAV929cq!UxRsa|F<6Q[gS1U7Q;CrBC/)DjU:L|HW?');
define('AUTH_SALT',        '[Xc<D!}_4@=Q1H>%]_{M$?&r0F>;}e.U,J-[Uquy}E/SmJr,c~%AYy]f|2a[d&dy');
define('SECURE_AUTH_SALT', 'LF$M?wPrPw0DcqqJ!}/x~[f 0N_?+^7tAuQJsv/5Z1,w(JLt=z;C>;_;fSxVb)dP');
define('LOGGED_IN_SALT',   'AVk7.@&3;4rV<MYn,F[8?@6%=%ZkNrS79gbKgAB7h8`HN_*^X9rZpnZFF1TMY4s[');
define('NONCE_SALT',       '_`|fDLsk.T_.cbASDnfld5`?Hj,N^71`_->,#IYH>@nWG;wlm0;wj(2!^9Odm@NS');

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
