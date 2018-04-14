<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://io.agency
 * @since      1.0.0
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 * @author     Rajneesh <rajneeshojha123@gmail.com>
 */
class Wp_Deals_And_Coupons_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-deals-and-coupons',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
