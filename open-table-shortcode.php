<?php
/**
 * Plugin Name: Open Table Shortcode
 * Plugin URI:  https://github.com/themebright/open-table-shortcode
 * Description: Easily embed the offical Open Table widget via configurable shortcode.
 * Author:      ThemeBright
 * Author URI:  https://themebright.com/
 * Version:     1.0.0
 * Text Domain: open-table-shortcode
 * Domain Path: /open-table-shortcode/languages/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

function ots_init() {

	if ( ! defined( 'OTS_VERSION' ) ) define( 'OTS_VERSION', '1.0.0' );
	if ( ! defined( 'OTS_PATH' ) )    define( 'OTS_PATH',    plugin_dir_path( __FILE__ ) );
	if ( ! defined( 'OTS_URL' ) )     define( 'OTS_URL',     esc_url( plugin_dir_url( __FILE__ ) ) );

	require_once OTS_PATH . 'open-table-shortcode/includes/admin.php';
	require_once OTS_PATH . 'open-table-shortcode/includes/shortcodes.php';

}
add_action( 'plugins_loaded', 'ots_init' );
