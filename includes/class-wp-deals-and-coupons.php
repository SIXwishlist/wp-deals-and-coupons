<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://io.agency
 * @since      1.0.0
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/includes
 * @author     Rajneesh <rajneeshojha123@gmail.com>
 */
class Wp_Deals_And_Coupons
{
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp_Deals_And_Coupons_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */

	private $plugin_admin, $plugin_public;
	private $post_type = 'scb_coupons';
	private $coupons_types = ['coupon' => 'Coupon', 'deal' => 'Deal'];
	private $coupons_status = ['publish' => 'Active', 'expired' => 'Expired', 'draft' => 'Inactive', 'pending' => 'Inactive','trash'=>'Inactive'];


	public function __construct()
	{
		if (defined('PLUGIN_NAME_VERSION'))
		{
			$this->version = PLUGIN_NAME_VERSION;
		}
		else
		{
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wp-deals-and-coupons';

		$this->load_dependencies();
		$this->set_locale();

		$this->plugin_admin = new Wp_Deals_And_Coupons_Admin($this->get_plugin_name(), $this->get_version());
		$this->plugin_public = new Wp_Deals_And_Coupons_Public($this->get_plugin_name(), $this->get_version());

		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_common_hooks();
	}
	public function __get($name)
	{
		return $this->{$name};
	}
	public function __set($name, $value)
	{
	}

	public function plugin_admin()
	{
		return $this->plugin_admin;
	}
	public function plugin_public()
	{
		return $this->plugin_public;
	}
	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wp_Deals_And_Coupons_Loader. Orchestrates the hooks of the plugin.
	 * - Wp_Deals_And_Coupons_i18n. Defines internationalization functionality.
	 * - Wp_Deals_And_Coupons_Admin. Defines all hooks for the admin area.
	 * - Wp_Deals_And_Coupons_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)).'includes/class-wp-deals-and-coupons-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)).'includes/class-wp-deals-and-coupons-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)).'admin/class-wp-deals-and-coupons-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)).'public/class-wp-deals-and-coupons-public.php';

		$this->loader = new Wp_Deals_And_Coupons_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wp_Deals_And_Coupons_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{
		$plugin_i18n = new Wp_Deals_And_Coupons_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{
		$this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('admin_enqueue_scripts', $this->plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('add_meta_boxes', $this->plugin_admin, 'add_meta_boxes');
		$this->loader->add_action('save_post', $this->plugin_admin, 'save_post');
		$this->loader->add_filter('manage_'.$this->post_type.'_posts_columns', $this->plugin_admin, 'set_custom_columns');
		$this->loader->add_action('manage_'.$this->post_type.'_posts_custom_column', $this->plugin_admin, 'custom_column', 10, 2);

		$this->loader->add_filter('parse_query', $this->plugin_admin, 'posts_filter_for_post_list');
		$this->loader->add_action('restrict_manage_posts', $this->plugin_admin, 'custom_filter_for_post_list');
		$this->loader->add_action('init', $this->plugin_admin, 'custom_post_status');

		$this->loader->add_action('admin_head', $this->plugin_admin, 'admin_head_css');
		$this->loader->add_action('admin_head', $this->plugin_admin, 'remove_mediabuttons');
		$this->loader->add_action('admin_footer', $this->plugin_admin, 'admin_foot_js');


 	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{
		$this->loader->add_action('wp_enqueue_scripts', $this->plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $this->plugin_public, 'enqueue_scripts');
		add_shortcode('deal_shortcode', [$this->plugin_public, 'deal_shortcode']);
	}

	private function define_common_hooks()
	{
		$this->loader->add_action('init', $this->plugin_admin, 'register_custom_post_type');
		$this->loader->add_action('init', $this->plugin_admin, 'register_custom_taxonomy');
	}

	public function on_plugin_activate()
	{
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wp_Deals_And_Coupons_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
