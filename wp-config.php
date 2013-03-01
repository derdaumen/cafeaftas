<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster** //
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden m�chtest. */
define('DB_NAME', 'wa4225_db4');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'wa4225_4');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'N&Rd2=3SQLdb4');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht ge�ndert werden */
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
define('AUTH_KEY',         'C@~ 5vSooLzQME#uUF/aPI(_1rM}lN:O-q.2$eJ/`)y}=(*2%DG:)dVHWYrOqwQP');
define('SECURE_AUTH_KEY',  'bZUTN[$!{%<D8|WTE.m*&DTO>%@9Fqy-)NcRouZuF+~]h4VE?tS=J,=<1J}6&HM<');
define('LOGGED_IN_KEY',    'U-aS:-ZnfB#_}tfq.]/T =e(b-7FXo:Y;bGpN$T[:12&1tCQ>lw5$zv)`gJD=j4Q');
define('NONCE_KEY',        'x+yo%/xwMeF<:kMDvOtj8}jjH|csv,<KQmN%c4CCjW0s8IQ%hMA`L=|KW2rIP{Xo');
define('AUTH_SALT',        '`c!MRCfyV=vvB&q$OK-X)^`fki6ZUMiAW@2T}lSI}UA5*(B}lY5.EA_-pnFbM!Ak');
define('SECURE_AUTH_SALT', 'Q^a}w>T+iJlJ+GY+(-+NqvvX=Dy<6?;;>d^5F&`;wz_M@3_zZV(HunQqHP:R9|0{');
define('LOGGED_IN_SALT',   'MLW0~Y+} @6jHkvk_6/s<l|;n95?[o|(yFr$;]%?|xdTZHA7x|~p0{.0t|`)]5Y|');
define('NONCE_SALT',       'N(LX3AMHb{ okBZI3BfJ(clg~`:QXuH e2^5?nRypPSC%P}LUO[>sQecF oVnmzF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
