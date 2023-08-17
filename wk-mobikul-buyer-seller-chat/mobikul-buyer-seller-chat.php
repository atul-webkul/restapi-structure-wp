<?php
/**
 * Plugin Name: Buyer seller Chat API
 * Description: Buyer seller Rest api helps to conversation between buyer and seller.
 * Author: Webkul
 * Version: 1.0.0
 * Author: Webkul
 * Author URI: https://webkul.com
 * Text Domain: wkmbsc
 * Requires at least: 5.0
 * Requires PHP: 7.3
 * WC requires at least: 5.0
 *
 * License: license.txt included with plugin
 * License URI: https://store.webkul.com/license.html
 *
 * @package Buyer seller Chat API
 **/
/**
 * Defined namespace
 */
defined( 'ABSPATH' ) || exit(); // Exit if accessed directly.

defined( 'WKMBSC_PLUGIN_FILE' ) || define( 'WKMBSC_PLUGIN_FILE', plugin_dir_path( __FILE__ ) );
defined( 'WKMBSC_PLUGIN_BASENAME' ) || define( 'WKMBSC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );



// Load core auto-loader.
require __DIR__ . '/inc/class-wkmbsc-autoload.php';

// Include the main Wkmbsc class.
if ( ! class_exists( 'Wkmbsc', false ) ) {
	include_once WKMBSC_PLUGIN_FILE . '/includes/class-wkmbsc.php';
	WKMBSC::get_instance();
}


