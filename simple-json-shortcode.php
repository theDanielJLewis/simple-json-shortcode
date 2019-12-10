<?php
/**
 * Plugin Name:       Simple JSON Shortcode
 * Plugin URI:        http://ahmadawais.com/coding-a-basic-shortcodes-plugin-boilerplate/
 * Description:       Coding shortcodes in a plugin with maintainable code practices.
 * Version:           1.0.1
 * Author:            Daniel J. Lewis
 * Author URI:        https://theaudacitytopodcast.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sjsons
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'SJSONS_VERSION' ) ) {
	define( 'SJSONS_VERSION', '1.0.1' );
}

if ( ! defined( 'SJSONS_NAME' ) ) {
	define( 'SJSONS_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'SJSONS_DIR' ) ) {
	define( 'SJSONS_DIR', WP_PLUGIN_DIR . '/' . SJSONS_NAME );
}

if ( ! defined( 'SJSONS_URL' ) ) {
	define( 'SJSONS_URL', WP_PLUGIN_URL . '/' . SJSONS_NAME );
}

require (__DIR__ . '/vendor/autoload.php');

/**
 * sjsons.
 *
 * @since 1.0.0
 */
if ( file_exists( SJSONS_DIR . '/shortcode/shortcode-sjsons.php' ) ) {
	require_once( SJSONS_DIR . '/shortcode/shortcode-sjsons.php' );
}
