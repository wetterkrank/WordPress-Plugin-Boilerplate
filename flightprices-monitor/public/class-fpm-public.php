<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://escapefromberl.in
 * @since      0.1
 *
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Flight_Prices_Monitor
 * @subpackage Flight_Prices_Monitor/public
 * @author     wetterkrank <wetterkrank@gmail.com>
 */
class Flight_Prices_Monitor_Public {

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
	 * @param      string    $flight_prices_monitor       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $flight_prices_monitor, $version ) {

		$this->flight_prices_monitor = $flight_prices_monitor;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->flight_prices_monitor, plugin_dir_url( __FILE__ ) . 'css/fpm-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->flight_prices_monitor, plugin_dir_url( __FILE__ ) . 'js/fpm-public.js', array( 'jquery' ), $this->version, false );

	}
        
	/**
	 * Register shortcodes for the public-facing side of the site.
	 *
	 * @since    0.1
	 */
        public function register_shortcodes() {
            add_shortcode('fpm_price', array ($this, 'add_price'));
        }

        // Function for fpm_price shortcode
        public function add_price($atts) {
            $a = shortcode_atts(array(
                'type' => 'micro',
                'from' => '',
                'to' => '',
                'earliest' => '',
                'latest' => '',
                'min_days' => '2',
                'max_days' => '3',
                'currency' => 'EUR',
                'locale' => 'en',
            ), $atts);

            // Validating the input
            // Todo: review defaults
            if (!in_array($a['type'],['micro','mini','full'])) {
                    $a['type'] = 'micro';
            }

            $a['from'] = filter_var($a['from'], FILTER_SANITIZE_STRING);
            $a['to'] = filter_var($a['to'], FILTER_SANITIZE_STRING);

            if (($earliest = strtotime($a['earliest'])) === false) {
                    $a['earliest'] = date('Y-m-d');
                } else {
                    $a['earliest'] = date('Y-m-d', $earliest);
            }

            if (($latest = strtotime($a['latest'])) === false) {
                    $a['latest'] = date('Y-m-d');
                } else {
                    $a['latest'] = date('Y-m-d', $latest);
            }

            $a['min_days'] = filter_var($a['min_days'], FILTER_SANITIZE_NUMBER_INT);
            $a['max_days'] = filter_var($a['max_days'], FILTER_SANITIZE_NUMBER_INT);            

            if (!in_array($a['currency'],['AED','AFN','ALL','AMD','ANG','AOA','ARS','AUD','AWG','AZN','BAM','BBD','BDT','BGN','BHD','BIF','BMD','BND','BOB','BRL','BSD','BTC','BTN','BWP','BYR','BZD','CAD','CDF','CHF','CLF','CLP','CNY','COP','CRC','CUC','CUP','CVE','CZK','DJF','DKK','DOP','DZD','EEK','EGP','ERN','ETB','EUR','FJD','FKP','GBP','GEL','GGP','GHS','GIP','GMD','GNF','GTQ','GYD','HKD','HNL','HRK','HTG','HUF','IDR','ILS','IMP','INR','IQD','IRR','ISK','JEP','JMD','JOD','JPY','KES','KGS','KHR','KMF','KPW','KRW','KWD','KYD','KZT','LAK','LBP','LKR','LRD','LSL','LTL','LVL','LYD','MAD','MDL','MGA','MKD','MMK','MNT','MOP','MRO','MTL','MUR','MVR','MWK','MXN','MYR','MZN','NAD','NGN','NIO','NOK','NPR','NZD','OMR','PAB','PEN','PGK','PHP','PKR','PLN','PYG','QAR','QUN','RON','RSD','RUB','RWF','SAR','SBD','SCR','SDG','SEK','SGD','SHP','SLL','SOS','SRD','STD','SVC','SYP','SZL','THB','TJS','TMT','TND','TOP','TRY','TTD','TWD','TZS','UAH','UGX','USD','UYU','UZS','VEF','VND','VUV','WST','XAF','XAG','XAU','XCD','XDR','XOF','XPD','XPF','XPT','YER','ZAR','ZMK','ZMW','ZWL'])) {
                    $a['currency'] = 'EUR';
            }

            if (!in_array($a['locale'],['ae','ag','ar','at','au','be','bg','bh','br','by','ca','ca-fr','ch','cl','cn','co','ct','cz','da','de','dk','ec','ee','el','en','es','fi','fr','gb','gr','hk','hr','hu','id','ie','il','in','is','it','ja','jo','jp','ko','kr','kw','kz','lt','mx','my','nl','no','nz','om','pe','ph','pl','pt','qa','ro','rs','ru','sa','se','sg','sk','sr','sv','th','tr','tw','ua','uk','us','vn','za'])) {
                    $a['locale'] = 'en';
            }

            // Returning html class replacing the fpm_price shortcode
            $params = 'data-type="' . $a['type']
                    . '" data-from="' . $a['from']
                    . '" data-to="' . $a['to']
                    . '" data-earliest="' . $a['earliest']
                    . '" data-latest="' . $a['latest']
                    . '" data-min_days="' . $a['min_days']
                    . '" data-max_days="' . $a['max_days']
                    . '" data-currency="' . $a['currency']
                    . '" data-locale="' . $a['locale']
                    . '"';
            return '<span class="fpmtag" ' . $params . ' style="display: inline;">...</span>';
        }

}
