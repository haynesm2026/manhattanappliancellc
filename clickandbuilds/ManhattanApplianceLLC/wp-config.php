<?php

define('FS_METHOD', 'direct');

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
define( 'DB_NAME', 'dbs4174583' );

/** MySQL database username */
define( 'DB_USER', 'dbu1032049' );

/** MySQL database password */
define( 'DB_PASSWORD', 'GJdjBVtdGRtcEBLYmKlr' );

/** MySQL hostname */
define( 'DB_HOST', 'db5004991032.hosting-data.io' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'P(%>Cn9/lY*m}h{T5{mgT:j_eCmr90=p:RraMMocv*y;:^_qQ&xe8hXt$e3UDkXn' );
define( 'SECURE_AUTH_KEY',   'OQr=qCy{=0?Z=m)GF4=4=UEd0HBiiR+2UbEGl:hlX5oT~i{lj|<G?FE{_]o ;DDi' );
define( 'LOGGED_IN_KEY',     'KFOkd}$0Q?AbnX<0AyEp@{~19Js)}ln%/0@&a8X-`[K?4|t;wf)QlD7 eAW#m8z]' );
define( 'NONCE_KEY',         'e>:T;5PiC^;mkm~bM)=vSWg:ZnN=Lw7>ckCb= LfWT|3u,zWQv)9PLSUWMk#|SzD' );
define( 'AUTH_SALT',         'TT6e`gV.*OQRwFd<[UvER8DBi$*6@r6>p*1k^Q{<f3FA8A%hd^~(NM381I8opBmL' );
define( 'SECURE_AUTH_SALT',  'uNxht}SiSATO0XmI{;HAG5GAUdLaF+S7Xnt.3m1)0naW7YzBqB#|:e|Zws$Ia_K_' );
define( 'LOGGED_IN_SALT',    'YeFB6Z~~v`l^mwDdlE&Qa(-HBUg[jQ=Qj=f0$dJekH7#{:o,dJu6)CdbsP[LaH0~' );
define( 'NONCE_SALT',        '7|yD:SupV:IE}]~^!D2M}WgpAXta_s8~~%P] /d=Xu94U-m=&0tW[Vns;OaTRp?d' );
define( 'WP_CACHE_KEY_SALT', '_4b)2f4Sr!B<$]<Gz:owj<(S-{#Q1m6Y@QgtpOh<66Jz22#f;QU0kC^u0?a3o~]6' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'KHCEVGYd';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
