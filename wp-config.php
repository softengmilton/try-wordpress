<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '7,LkZ>op7?e=B0z*ObF{CkUI <U:+@TG ^~e,qw|#nI#8f8OK#jIH(bVkXS1 FVI' );
define( 'SECURE_AUTH_KEY',  '>TMH&lkmeQpnD@+r:}HGT.FB~,~8O |pn!{B<[xm0*yGLdNe %--OC#]PF7I{UX%' );
define( 'LOGGED_IN_KEY',    'UY6 fI1oEmcU1(8c9J4L+.kj0TrdxPTWF4}y(]]qSEDdoLX8z!Tljg=D{A/aPUO2' );
define( 'NONCE_KEY',        'H%8S[y+Mtwqib:w}BN?8b4)Cr&-zk|wo][>UtS:5G9G11vN/Pe}~v(9Qh!9.%NoQ' );
define( 'AUTH_SALT',        '+~;;s8K$P(vG[p^P5m+X*vA-Q6wh;dg 3m$SXVF~1J:U(uf>)&xQJ5vS>cEb</T/' );
define( 'SECURE_AUTH_SALT', 'atGaLDCD#d8q{,B[kCJ4a/rRe0.|[Xs;=@o-? G5d1Xk_k>TKR6<+W.{EC6*l~)n' );
define( 'LOGGED_IN_SALT',   'R6kEP^X1kk0vIxkI/fuTFIt~C;%v=C5KP)xtY/PWVN&EN[Ex{~+9ygZdqYyX+)U]' );
define( 'NONCE_SALT',       'iVEBO(]7mA&4:pTbb%J*JU3u9l#Y/vLxgm,S}RGgD74gq3A<9!:w[znba$R9yE:R' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
