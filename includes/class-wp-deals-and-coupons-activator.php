<?php

/**
 * Fired during plugin activation
 *
 * @link       https://io.agency
 * @since      1.0.0
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 * @author     Rajneesh <rajneeshojha123@gmail.com>
 */
class Wp_Deals_And_Coupons_Activator
{
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		wp_deals_and_coupons()->on_plugin_activate();
	}

}
