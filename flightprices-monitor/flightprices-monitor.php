<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://escapefromberl.in
 * @since             1.0.0
 * @package           Flight_Prices_Monitor
 *
 * @wordpress-plugin
 * Plugin Name:       Flight Prices Monitor
 * Plugin URI:        http://escapefromberl.in/flight-prices-monitor/
 * Description:       Displays the lowest flight price for selected route & time range
 * Version:           0.1
 * Author:            wetterkrank
 * Author URI:        http://escapefromberl.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       flight-prices-monitor
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'FPM_VERSION', '0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_flight_prices_monitor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fpm-activator.php';
	Flight_Prices_Monitor_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_flight_prices_monitor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fpm-deactivator.php';
	Flight_Prices_Monitor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flight_prices_monitor' );
register_deactivation_hook( __FILE__, 'deactivate_flight_prices_monitor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fpm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_flight_prices_monitor() {

	$plugin = new Flight_Prices_Monitor();
	$plugin->run();

}
run_flight_prices_monitor();
