<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://io.agency
 * @since      1.0.0
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/public
 * @author     Rajneesh <rajneeshojha123@gmail.com>
 */
class Wp_Deals_And_Coupons_Public
{
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Deals_And_Coupons_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Deals_And_Coupons_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__).'css/wp-deals-and-coupons-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__).'js/wp-deals-and-coupons-public.js', array('jquery'), $this->version, false);
		//wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

		//wp_enqueue_script( 'jquery-ui-dialog' );
		//wp_enqueue_style( 'wp-jquery-ui-dialog' );
	}
	function deal_shortcode($atts)
	{
		$atts = shortcode_atts(array(
			'type' => '',
			'limit' => 0,
		), $atts);

		if (isset($atts['type']) && !in_array($atts['type'], array_keys(wp_deals_and_coupons()->coupons_types)))
		{
			$atts['type'] = '';
		}

		
		$args = array(
			'post_type' => wp_deals_and_coupons()->post_type,
			'post_status' => ['publish'],
			'meta_query' => [],
		);

		if ($atts['limit'])
		{
			$args['posts_per_page'] = $atts['limit'];
		}

		if ($atts['type'])
		{
			if ($atts['type'] == 'deal')
			{
				$args['meta_query'][] = array(
					'key' => 'scb-coupon-type',
					'value' => 'deal',
					'compare' => '=',
				);
			}
			elseif ($atts['type'] == 'coupon')
			{
				$args['meta_query'][] = array(
					'key' => 'scb-coupon-type',
					'value' => 'coupon',
					'compare' => '=',
				);
			}
		}
 		$coupon_query = new WP_Query($args);

		require_once __DIR__."/partials/deal_shortcode.php";

		return;
	}
}
