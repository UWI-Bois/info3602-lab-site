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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'VrDgYz9/Qc5RZeID94Xat9a0/2iRIY3KsE11tP+BCobXTCukmobzGCw54q3hHfNbe1mzFR0wvF6J296bS36qhg==');
define('SECURE_AUTH_KEY',  'EkZpp4uDuOPshIsiW33MShqIkaSrM4gQMi9tXY4Rlre4bbQ2L7mXYM8T39BrzFxj7DKpO8crHMR2kbV1qYluMw==');
define('LOGGED_IN_KEY',    'mnw083XhtFrBevBkAb5LaMQCJhUratKUdA7AcoZbTFHBsoov17i9bREZDfBc+qdskgUwU8KI5NjmO+v66icv7g==');
define('NONCE_KEY',        'KNWfIqFkyw0eInUsiQmQ3ua1yegqzcRIHigbwBVrbI8hNJ4xnLpngtTPJzJjWvRLTg2qPCo6ZB75k/gJmckMgQ==');
define('AUTH_SALT',        'zIoz5XiGhoYKJMzBc2PUsO/pxEJcAziX/bAZkSQY2BILZgz7DJ3qyag0nqSp9kd5kq7JXe92fhWME7YDaggSig==');
define('SECURE_AUTH_SALT', 'tlI22lHbSG+f2o+FtyXB7x4f0J2OHJZfTaDUJK2Zfv+Hnm7HppP0CP2aIpYLk0ygavUXqo3WXPnW+k056Ol6Jw==');
define('LOGGED_IN_SALT',   'Pi7uk6mhsabV+Sv6w7ay+orr/FuaXFpYn+DR7R124ru/8X6sn13n1dUmz9fyphpPPUYkWOMgZcSnkIZqt+Velg==');
define('NONCE_SALT',       'gUwo0ty+Z8FDt82Afbk8DhJuc0K1eThIApcg525Ctmn1NnZtDP1pW7qTzhXsBWsQ1+7M9b6xSfddhDrijD1jKg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
