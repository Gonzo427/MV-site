<?php
/*
Plugin Name:  Themify Shortcodes
Plugin URI:   http://themify.me/
Version:      1.0.1
Author:       Themify
Description:  A set of shortcodes that can be used with any theme.
Text Domain:  themify-shortcodes
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die( '-1' );

/**
 * Bootstrap Themify Shortcodes plugin
 *
 * @since 1.0
 */
function themify_shortcodes_setup() {
	if( ! defined( 'THEMIFY_SHORTCODES_DIR' ) )
		define( 'THEMIFY_SHORTCODES_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

	if( ! defined( 'THEMIFY_SHORTCODES_URI' ) )
		define( 'THEMIFY_SHORTCODES_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

	if( ! defined( 'THEMIFY_SHORTCODES_VERSION' ) )
		define( 'THEMIFY_SHORTCODES_VERSION', '1.1' );

	include THEMIFY_SHORTCODES_DIR . 'includes/system.php';

	Themify_Shortcodes::get_instance();
}
add_action( 'after_setup_theme', 'themify_shortcodes_setup', 100 );

/**
 * Load updater 
 *
 * @since 1.0.0
 */
function themify_shortcodes_load_updater() {
	if ( is_admin() && current_user_can( 'update_plugins' ) ) {
		if ( ! function_exists( 'get_plugin_data') ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_basename = plugin_basename( __FILE__ );
		$plugin_data = get_plugin_data( plugin_dir_path( __FILE__ ) . basename( $plugin_basename ) );
		if ( ! class_exists( 'Themify_Plugin_Updater' ) ) {
			include_once plugin_dir_path( __FILE__ ) . 'updater/class-themify-plugin-updater.php';
		}
		new Themify_Plugin_Updater( array(
			'base_name'   => $plugin_basename,
			'plugin_data' => $plugin_data,
			'base_path'   => plugin_dir_path( __FILE__ ),
			'base_url'    => plugin_dir_url( __FILE__ ),
			'admin_page'  => 'themify-shortcodes',
		), $plugin_data['Version'] );
	}
}
add_action( 'init', 'themify_shortcodes_load_updater' );