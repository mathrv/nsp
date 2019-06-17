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
define( 'DB_NAME', 'nsp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@w&iAAU{grf^u?E9vnHslQrRC_@zcR,v%X[!k5/]l/Y91<3Ob45cu$TE>kx*ong?' );
define( 'SECURE_AUTH_KEY',  '!5(`I#Ps0i1<oR{K Nu$n}SV3hE4qL$!eAXGc *=VLC@sT+a-@Jw$Avq(W0vd@&d' );
define( 'LOGGED_IN_KEY',    'L$:C1]pmhCQNlF}mdO$aM23/[LC[=T5S2OhJ6tJj*^.TC[m[Zv;%`krZwGq5?->R' );
define( 'NONCE_KEY',        'mqMO$SW J]RiVDKK]yL&Nv|D!AtFxPtDzqAuFCClL2=XR>#(`dqM7Q:LUy}V2sh]' );
define( 'AUTH_SALT',        'b5HA6TaCoeD2^nH[145N>R}L=Zjr##V?=sbT{8OxQf?$[BLDGf^uzX0hy}J9~4j0' );
define( 'SECURE_AUTH_SALT', 'VP06.ub&3O$Yj;d5q)wj}9wU@13vW+~iH.(Vi`iJeAbj4[.8gFyx7[mF#E+To]0u' );
define( 'LOGGED_IN_SALT',   'F.I=LFCM3cDxus0/CsL%Y9(oVVa6%O]S5{~cp`cZobm,j_r4)NmP&5Mw gGSc2qh' );
define( 'NONCE_SALT',       'o(PAK+<(P&uH:^S6z_cHKMVt}3`_;n!!858oTRrhzev3U(8?)4Tz uWrr[$KcNro' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_nsp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
