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
define('DB_NAME', 'securewp_dev');

/** MySQL database username */
define('DB_USER', 'howie@localhost');

/** MySQL database password */
define('DB_PASSWORD', 'chicken');

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
define('AUTH_KEY',         '.80i5q*INtu9&%7aDDV}AIU{t~T.l=.BbZ{SMtr6B3y;s~6]8eeg?,8 g.[4b%JL');
define('SECURE_AUTH_KEY',  'd-D*g~@_W/o0& ;O>d7I $T]u=HCy!?}HK.DJLp^.lDttDrwt4y7#_X>bubMQHH,');
define('LOGGED_IN_KEY',    ';KHmZwD}<>:hDXDj8Iz+P4Sa7*c:>UQYB>Akhu$oiPvbZLe*ef+{FZ7062,mt|M_');
define('NONCE_KEY',        'B2w3$3.9_n1|9;_R(^{c+r|68Q*x[7K.3x!|EYyn7@=Q,n[.sNbM$aQ#~aST:zaP');
define('AUTH_SALT',        'H/y|gV4LqrUcSA;Znv-#;6momGtTF.{jVOC&;mFa}^-e~G5r3IO}1[Jw.]J1yV/L');
define('SECURE_AUTH_SALT', '3yjalGlj:I|a|z}#owTb&H`6c(Fo(|V;AOx)zU;iVLEn+baeZ?1Zt(@QgW?M+[^M');
define('LOGGED_IN_SALT',   'x$G%[d[/e-RPz[HR.RpZ Deeh8]TbMD]Vo%$i%J|*d$0C6CURc?Ik6.;rfEM,&x)');
define('NONCE_SALT',       '/DO@?P9*}Rj(U`duw$SjG}**?$QD(LxBu)H`|krcEM_zW &Sdg5UgufDa-?I&vOs');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'securewp_dev_';

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
