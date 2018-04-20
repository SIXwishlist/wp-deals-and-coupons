<?php

/**
 * The plugin bootstrap file
 *
 * An awesome plugin to Create and manage Deals and coupon codes.
 *
 * @link              https://io.agency
 * @since             1.0.0
 * @package           Wp_Deals_And_Coupons
 *
 * @wordpress-plugin
 * Plugin Name:       Wp Deals and coupons
 * Plugin URI:        https://io.agency
 * Description:       Create and manage Deals and coupon codes
 * Version:           1.0.3
 * Author:            Rajneesh
 * Author URI:        https://io.agency
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-deals-and-coupons
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC'))
{
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.3');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-deals-and-coupons-activator.php
 */
function activate_wp_deals_and_coupons()
{
	require_once plugin_dir_path(__FILE__).'includes/class-wp-deals-and-coupons-activator.php';
	Wp_Deals_And_Coupons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-deals-and-coupons-deactivator.php
 */
function deactivate_wp_deals_and_coupons()
{
	require_once plugin_dir_path(__FILE__).'includes/class-wp-deals-and-coupons-deactivator.php';
	Wp_Deals_And_Coupons_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wp_deals_and_coupons');
register_deactivation_hook(__FILE__, 'deactivate_wp_deals_and_coupons');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'vendor/autoload.php';

require plugin_dir_path(__FILE__).'includes/class-wp-deals-and-coupons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function wp_deals_and_coupons()
{
	static $plugin;
	if (!$plugin)
	{
		 
		$plugin = new Wp_Deals_And_Coupons();
		$plugin->run();

	}

	return $plugin;
}
wp_deals_and_coupons();
