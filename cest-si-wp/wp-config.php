<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cest_si_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'poetry');

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
define('AUTH_KEY',         '/ui.+/`k|vYnLQxP$p8Rl#Mh&c`b#Mh4Fp.:v33e}6N&Usx-$)0i3U{)39[;k$y=');
define('SECURE_AUTH_KEY',  'a;V=$[gTcigTnH;iV|l3ezsj`d.zoTGCM)YR1bgFF||/|E,+rN-M|ge|huoBi.Zp');
define('LOGGED_IN_KEY',    'Cq&0ncP?~`Ho(9z%WssqxJNWh<NKSSPGojvLhsaC0~xE!s-l2`|_NS-i p(Or<,^');
define('NONCE_KEY',        'eD|:LT=dSqztvHhS*+0*u *qt9,m,dEdgV`vWU@1{$z$:VWDbf`f-<i}gg:w&6<p');
define('AUTH_SALT',        'UYirFfG$<`Q]p*]c|EW`J`{ns+/z15[e<Ad_F}#ORB504}^+QX~BSv yV@30%X+z');
define('SECURE_AUTH_SALT', '?%zp9k<Qn3pGK3b(Kgh>0G{56];x&oZszTwRkh/{ 7# kma{n/=TvgKH&wtc6re2');
define('LOGGED_IN_SALT',   'ncN/]B>_RJs)[JJf*];NNFMe!3Q!cWXVV|4#:br7!GC:u;>RpkA*W9|Q-==qte[>');
define('NONCE_SALT',       'rUMB@xt+%x|j3{N-fkjBh|C/uxdppR$F2&],_z7)fDfNdcRQ+.P68}D^)0lbw_Kt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
