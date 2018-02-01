<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://escapefromberl.in
 * @since      0.1
 *
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/includes
 * @author     wetterkrank <wetterkrank@gmail.com>
 */
class Flight_Prices_Monitor_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $flight_prices_monitor    The ID of this plugin.
	 */
	private $flight_prices_monitor;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1
	 * @param      string    $flight_prices_monitor       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $flight_prices_monitor, $version ) {

		$this->flight_prices_monitor = $flight_prices_monitor;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Flight_Prices_Monitor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Flight_Prices_Monitor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->flight_prices_monitor, plugin_dir_url( __FILE__ ) . 'css/fpm-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    0.1
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Flight_Prices_Monitor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Flight_Prices_Monitor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->flight_prices_monitor, plugin_dir_url( __FILE__ ) . 'js/fpm-admin.js', array( 'jquery' ), $this->version, false );

	}

}
