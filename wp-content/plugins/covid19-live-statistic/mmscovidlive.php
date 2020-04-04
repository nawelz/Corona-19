<?php
/**
* Plugin Name: COVID19 Live Statistic
* Description: Live statistics tracking the number of confirmed cases, recovered and deaths by country or global due to the COVID-19. 
* Plugin URI: https://www.mdmasudsikdar.com
* Version: 1.0.1
* Author: MD Masud Sikdar
* Author URI: http://mdmasudsikdar.com/
* Requires at least: 4.4
* Tested up to: 5.4
* License: GNU GPLv2
* License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
*
* Text Domain: mmscovidlive
* Domain Path: /languages/
**/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'MmsCovidLive' ) ) {
	class MmsCovidLive {

		function __construct() {

			if ( ! defined( 'MMSCOVIDLIVE_URL' ) ) {
				define( 'MMSCOVIDLIVE_URL', plugin_dir_url( __FILE__ ) );
			}
			if ( ! defined( 'MMSCOVIDLIVE_PATH' ) ) {
				define( 'MMSCOVIDLIVE_PATH', plugin_dir_path( __FILE__ ) );
			}
			add_action( 'init', array( $this, 'load_textdomain' ) );
			add_action( 'init', array( $this, 'register_assets' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_assets' ) );
			add_action( 'admin_menu', array( $this, 'register_custom_menu_page' ) );
			add_shortcode( 'mmscovidlive', array($this, 'shortcode') );
			$this->createJob();

			$getOptionAll = get_option('mmscovidlive_all');
			$getOptionCountries = get_option('mmscovidlive_countries');

			if (!$getOptionCountries) {
				$countries = $this->getData(true);
				update_option( 'mmscovidlive_countries', $countries );
			}

			if (!$getOptionAll) {
				$all = $this->getData(false);
				update_option( 'mmscovidlive_all', $all );
			}
		}
		/**
		 * Register a custom menu page.
		 */
		function register_custom_menu_page(){
			add_menu_page( 
				esc_attr__( 'Covid-19 Live statistics', 'mmscovidlive' ),
				esc_attr__( 'COVID19 Live Statistic', 'mmscovidlive' ),
				'manage_options',
				'mmscovidlive',
				array($this, 'custom_menu_page'),
				'dashicons-shield-alt',
				81
			); 
		}
		
		
		/**
		 * Display a custom menu page
		 */
		function custom_menu_page(){
			include_once( MMSCOVIDLIVE_PATH .'templates/admin.php');
		}

		function register_assets() {
			wp_register_style( 'mmscovidlive', MMSCOVIDLIVE_URL . 'assets/css/style.css', array(), '1.0.2' );
		}

		public function admin_enqueue_assets() {
			wp_enqueue_script( 'mmscovidlive-admin', MMSCOVIDLIVE_URL . 'assets/js/admin.js', array( 'jquery' ), '', true );
		}

		function createJob(){
			add_filter( 'cron_schedules', array( $this, 'add_wp_cron_schedule' ) );

			if ( ! wp_next_scheduled( 'covid_job' ) ) {

				$next_timestamp = wp_next_scheduled( 'covid_job' );
				if ( $next_timestamp ) {
					wp_unschedule_event( $next_timestamp, 'covid_job' );
				}

				wp_schedule_event( time(), 'every_15minute', 'covid_job' );
			}


			add_action( 'covid_job', array($this,'getDatafromAPI') );
		}

		function add_wp_cron_schedule( $schedules ) {

			$schedules['every_15minute'] = array(
				'interval' => 15*60,
				'display'  => esc_attr__( 'Every 15 minutes', 'mmscovidlive' ),
			);
	
			return $schedules;
		}
		
		function getDatafromAPI() {
			$all = $this->getData(false);
			$countries = $this->getData(true);
			$getOptionAll = get_option('mmscovidlive_all');
			$getOptionCountries = get_option('mmscovidlive_countries');

			if ($getOptionAll) {
				update_option( 'mmscovidlive_all', $all );
			} else {
				add_option('mmscovidlive_all', $all);
			}

			if ($getOptionCountries) {
				update_option( 'mmscovidlive_countries', $countries );
			} else {
				add_option('mmscovidlive_countries', $countries);
			}
			
		}

		/**
		 * Load text domain
		 */
		function load_textdomain() {
			load_plugin_textdomain( 'mmscovidlive', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		function getData($countryCode = false){
			$endPoint 	= 'https://corona.lmao.ninja/';
			$methodPath = 'all';
			if ($countryCode) {
				$methodPath = 'countries';
			}
			$endPoint = $endPoint.$methodPath;

			$args = array(
				'timeout' => 60
			); 

			$request = wp_remote_get($endPoint, $args);
			$body = wp_remote_retrieve_body( $request );
			$data = json_decode( $body );

			return $data;
		}

		function shortcode( $atts ){
			$params = shortcode_atts( array(
				'title' => esc_attr__( 'Global', 'mmscovidlive' ),
				'country' => null,
				'label_confirmed' => esc_attr__( 'Confirmed', 'mmscovidlive' ),
				'label_deaths' => esc_attr__( 'Deaths', 'mmscovidlive' ),
				'label_recovered' => esc_attr__( 'Recovered', 'mmscovidlive' ),
				'style' => 'default'
			), $atts );

			$data = get_option('mmscovidlive_all');

			if ($params['country']) {
				$data = get_option('mmscovidlive_countries');
				$new_array = array_filter($data, function($obj) use($params) {
					if ($obj->country === $params['country']) {
						return true;
					}
					return false;
				});

				if ($new_array) {
					$data = reset($new_array);
				}
				
			}

			ob_start();
			echo $this->render_item($params, $data);
			return ob_get_clean();
		}

		function render_item($params, $data){
			wp_enqueue_style( 'mmscovidlive' );
			ob_start();
			?>
			<div class="covid-item covid-style-<?php echo esc_attr($params['style'] ? $params['style'] : 'default'); ?> covid-<?php echo esc_attr($params['country'] ? 'country' : 'global'); ?>" >
				<h4 class="covid-title"><?php echo esc_html(isset($params['title']) ? $params['title'] : ''); ?></h4>
				<div class="covid-row">
					<div class="covid-col covid-confirmed">
						<div class="covid-value"><?php echo esc_html($data->cases); ?></div>
						<div class="covid-label"><?php echo esc_html($params['label_confirmed']); ?></div>
					</div>
					<div class="covid-col covid-deaths">
						<div class="covid-value"><?php echo esc_html($data->deaths); ?></div>
						<div class="covid-label"><?php echo esc_html($params['label_deaths']); ?></div>
					</div>
					<div class="covid-col covid-recovered">
						<div class="covid-value"><?php echo esc_html($data->recovered); ?></div>
						<div class="covid-label"><?php echo esc_html($params['label_recovered']); ?></div>
					</div>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}
		

	}

	new MmsCovidLive();
}