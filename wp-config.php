<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'b183905_jkdy' );

/** Database username */
define( 'DB_USER', 'u183905_mmpq' );

/** Database password */
define( 'DB_PASSWORD', 'gT18sM9dY' );

/** Database hostname */
define( 'DB_HOST', '78.108.80.33' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'CHVTD[,jhKZ@lH39i=LZDsw)Mpe8W3]-3jLHWd+h.^4^y%0W;?O<=Bc0N7//Og;B' );
define( 'SECURE_AUTH_KEY',   'sn58t/s;jsY45-@n_[moh^](I; {IeYXUN:g.B`*(Y&6rsj.,>dz/p&w2O3-FKc)' );
define( 'LOGGED_IN_KEY',     'e,jM|k53*JaO,jFVpv<;m ;`JdQkTT$t%6|?N,N*xjZI1dY<]mkiFA?!4#216=ni' );
define( 'NONCE_KEY',         ',d;v4&M|G%+f.&4?p:)dT9s[80=A9s,;&-~7BlQ`t,{,t$`jA;jfy?p5nPUe^K)w' );
define( 'AUTH_SALT',         '#}vA(!MtjT]B6ipOfFL0>k_q XoZ_7EPn!Wn~2?`s59_ms&CCSkC1>4CD+iKM/mG' );
define( 'SECURE_AUTH_SALT',  'y ;Dh13dt)=xS[9GBg+4|oGN:q7jPPee-J3)X`]a,#:W<9&0Iu8ux[zTJuX7!c:d' );
define( 'LOGGED_IN_SALT',    '+bh<B~[9`MU6 IM?tTmgtS<t7t!u}T*%dcc/40F[daX<0Zh{XP[TZ<bvQD}@w-u,' );
define( 'NONCE_SALT',        '_R)kCT4EZR~0E(~a.;c%_gv6HW(oO6)FBBG7a)=s6S}*RN{Dn-#=h;?B^+qG0M(8' );
define( 'WP_CACHE_KEY_SALT', '2Ocr|ArvlTVOt=C:+t;fa8LB*H:jb}/1Q6AJ&9r&Q&6!@m&.c2:Ul&^ZC@Ej&6c[' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
