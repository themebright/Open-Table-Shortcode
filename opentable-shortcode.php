<?php
/**
 * Plugin Name: OpenTable Shortcode
 * Plugin URI:  https://github.com/themebright/OpenTable-Shortcode
 * Description: Embed the offical OpenTable widget via configurable shortcode.
 * Author:      ThemeBright
 * Author URI:  https://themebright.com/
 * Version:     1.0.0
 * Text Domain: opentable-shortcode
 * Domain Path: /opentable-shortcode/languages/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

function ots_init() {

	if ( ! defined( 'OTS_VERSION' ) ) define( 'OTS_VERSION', '1.0.0' );
	if ( ! defined( 'OTS_PATH' ) )    define( 'OTS_PATH',    plugin_dir_path( __FILE__ ) );
	if ( ! defined( 'OTS_URL' ) )     define( 'OTS_URL',     esc_url( plugin_dir_url( __FILE__ ) ) );

	require_once OTS_PATH . 'opentable-shortcode/includes/admin.php';
	require_once OTS_PATH . 'opentable-shortcode/includes/shortcodes.php';

}
add_action( 'plugins_loaded', 'ots_init' );
