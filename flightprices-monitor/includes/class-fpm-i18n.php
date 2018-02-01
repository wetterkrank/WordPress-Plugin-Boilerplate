<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://escapefromberl.in
 * @since      0.1
 *
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/includes
 * @author     wetterkrank <wetterkrank@gmail.com>
 */
class Flight_Prices_Monitor_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'flight-prices-monitor',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
