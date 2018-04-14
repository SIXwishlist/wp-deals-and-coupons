<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://io.agency
 * @since      1.0.0
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Deals_And_Coupons
 * @subpackage Wp_Deals_And_Coupons/admin
 * @author     Rajneesh <rajneeshojha123@gmail.com>
 */
class Wp_Deals_And_Coupons_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */

	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__).'css/wp-deals-and-coupons-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__).'js/wp-deals-and-coupons-admin.js', array('jquery', 'jquery-ui-datepicker'), $this->version, false);
		wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	}

	public static function register_custom_post_type()
	{
		if (@$_REQUEST['tstttxx1234'])
		{
			$this->create_sample_deals();
			p_D('x');
		}
		$name_singular = "Coupon";
		$name_plural = "Coupons";
		$labels = array(
			'name' => sprintf(esc_html__('%s', 'scb_dc'), $name_plural),
			'singular_name' => sprintf(esc_html__('%s', 'scb_dc'), $name_singular),
			'menu_name' => sprintf(esc_html__('%s', 'scb_dc'), $name_plural),
			'name_admin_bar' => sprintf(esc_html__('%s', 'scb_dc'), $name_plural),
			'add_new' => sprintf(esc_html__('Add New %s', 'scb_dc'), $name_singular),
			'add_new_item' => sprintf(esc_html__('Add New %s', 'scb_dc'), $name_singular),
			'edit_item' => sprintf(esc_html__('Edit %s', 'scb_dc'), $name_singular),
			'new_item' => sprintf(esc_html__('New %s', 'scb_dc'), $name_singular),
			'view_item' => sprintf(esc_html__('View %s', 'scb_dc'), $name_singular),
			'search_items' => sprintf(esc_html__('Search %s', 'scb_dc'), $name_plural),
			'not_found' => sprintf(esc_html__('No %s found', 'scb_dc'), $name_plural),
			'not_found_in_trash' => sprintf(esc_html__('No %s found in Trash', 'scb_dc'), $name_plural),
		);
		$args = array(
			'labels' => $labels,
			'description' => sprintf(esc_html__('%s Deals And coupons', 'scb_dc'), $name_singular),
			'supports' => array('title', 'thumbnail', 'editor'),
			'public' => false,
			'publicly_queriable' => true,
			'show_ui' => true,
			'menu_position' => 55,
			'has_archive' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'show_in_nav_menus' => false,
		);

		register_post_type(wp_deals_and_coupons()->post_type, $args);
	}

	public static function register_custom_taxonomy()
	{
		return;
		$taxonomy_singular = "Coupon Category";
		$taxonomy_plural = "Coupon Categories";
		$labels = array(
			'name' => sprintf(esc_html__('%s', 'scb_dc'), $taxonomy_singular),
			'singular_name' => sprintf(esc_html__('%s', 'scb_dc'), $taxonomy_plural),
			'search_items' => sprintf(esc_html__('Search %s', 'scb_dc'), $taxonomy_plural),
			'all_items' => sprintf(esc_html__('All %s', 'scb_dc'), $taxonomy_plural),
			'parent_item' => sprintf(esc_html__('Parent %s', 'scb_dc'), $taxonomy_plural),
			'parent_item_colon' => sprintf(esc_html__('Parent %s:', 'scb_dc'), $taxonomy_plural),
			'edit_item' => sprintf(esc_html__('Edit %s', 'scb_dc'), $taxonomy_singular),
			'update_item' => sprintf(esc_html__('Update %s', 'scb_dc'), $taxonomy_plural),
			'add_new_item' => sprintf(esc_html__('Add New %s', 'scb_dc'), $taxonomy_singular),
			'new_item_name' => sprintf(esc_html__('New %s Name', 'scb_dc'), $taxonomy_singular),
			'menu_name' => sprintf(esc_html__('%s', 'scb_dc'), $taxonomy_plural),
			'popular_items' => sprintf(esc_html__('Popular %s', 'scb_dc'), $taxonomy_plural),
			'separate_items_with_commas' => sprintf(esc_html__('Separate %s with commas', 'scb_dc'), $taxonomy_plural),
			'add_or_remove_items' => sprintf(esc_html__('Add or remove %s', 'scb_dc'), $taxonomy_singular),
			'choose_from_most_used' => sprintf(esc_html__('Choose from the most used %s', 'scb_dc'), $taxonomy_plural),
		);
		$args = array(
			'labels' => $labels,
			'public' => false,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'show_tagcloud' => false,
			'show_admin_column' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'scb_coupon_cat', 'with_front' => true),
			'query_var' => true,
		);

		register_taxonomy('scb_coupon_cat', array(wp_deals_and_coupons()->post_type), $args);
	}

	public function add_meta_boxes()
	{
		//coupon_details_ ==>scb_dc_dt
		//coupon-details ==> scb-coupon-details
		add_meta_box(
			'scb-coupon-details',
			__('Coupon Details', 'scb_dc'),
			array($this, 'render_meta_box_callback'),
			wp_deals_and_coupons()->post_type,
			'normal',
			'core'
		);
	}

	public function render_meta_box_callback($post)
	{
		$meta_values = get_post_meta($post->ID);

		$coupons_hide = ['1' => 'Yes', '0' => 'No'];
		require_once __DIR__."/partials/coupon-meta-box.php";
	}

	public function save_post($post_id)
	{
		$fnRandString = function ($length)
		{
			return substr(str_shuffle(str_repeat($x = '-#ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
		};

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		{
			return;
		}

		if (!isset($_POST['scb_dc_nonce']) || !wp_verify_nonce($_POST['scb_dc_nonce'], 'scb_dc_data'))
		{
			return;
		}

		if (!@current_user_can('edit_post'))
		{
			return;
		}
		$data = [];
		$data['scb-coupon-type'] = trim(sanitize_text_field(@$_POST['scb-coupon-type']));
		$data['scb-coupon-type'] = in_array($data['scb-coupon-type'], array_keys(wp_deals_and_coupons()->coupons_types)) ? $data['scb-coupon-type'] : 'coupon';

		$data['scb-coupon-code'] = trim(sanitize_text_field(@$_POST['scb-coupon-code']));
		$data['scb-coupon-code'] = $data['scb-coupon-type'] == 'deal' ? '' : ($data['scb-coupon-code'] ?: $fnRandString(5));

		$data['scb-coupon-button-text'] = trim(sanitize_text_field(@$_POST['scb-coupon-button-text']));
		$data['scb-coupon-button-text'] = $data['scb-coupon-button-text'] ?: ($data['scb-coupon-type'] == 'coupon' ? 'Coupon' : 'Deal');

		$data['scb-coupon-deal-link'] = trim(esc_url(@$_POST['scb-coupon-deal-link']));
		$data['scb-coupon-deal-link'] = $data['scb-coupon-type'] == 'coupon' ? '' : ($data['scb-coupon-deal-link'] ?: get_site_url());

		$data['scb-coupon-text'] = trim(sanitize_text_field(@$_POST['scb-coupon-text']));
		$data['scb-coupon-text-second'] = trim(sanitize_text_field(@$_POST['scb-coupon-text-second']));
		$data['scb-coupon-description'] = trim(sanitize_textarea_field(@$_POST['scb-coupon-description']));
		$data['scb-coupon-terms'] = trim(sanitize_textarea_field(@$_POST['scb-coupon-terms']));
		$data['scb-coupon-hide-expired'] = 1; //(int) (@$_POST['scb-coupon-hide-expired']);
		$data['scb-coupon-expire-date'] = trim(sanitize_text_field(@$_POST['scb-coupon-expire-date']));
		foreach ($data as $key => $value)
		{
			update_post_meta($post_id, $key, $value);
		}
	}

	function set_custom_columns($columns)
	{
		unset($columns['author']);

		$new = array();
		$scb_coupon_type = $defaults['tags'];
		unset($defaults['tags']);

		foreach ($columns as $key => $value)
		{
			if ($key == 'date')
			{
				$new['scb_coupon_type'] = __('Coupon Type', 'scb_dc');
				$new['scb_expire_date'] = __('Expires On', 'scb_dc');
				$new['scb_hide_expire'] = __('Hide when expired', 'scb_dc');
				$new['status'] = __('Status', 'scb_dc');
			}
			$new[$key] = $value;
		}

		return $new;

		return $columns;
	}

	function custom_column($column, $post_id)
	{
		switch ($column)
		{
		case 'scb_coupon_type':
			$coupon_type = get_post_meta($post_id, 'scb-coupon-type', true);

			$coupon_label = wp_deals_and_coupons()->coupons_types[$coupon_type];

			$data = $coupon_type == 'coupon' ? get_post_meta($post_id, 'scb-coupon-code', true) : "<a target='_blank' href='".($link = get_post_meta($post_id, 'scb-coupon-deal-link', true))."'>$link</a>";

			echo "<div>$coupon_label</div><div  class='deal-block deal-block-$coupon_type' > $data </div>";
			break;

		case 'scb_expire_date':
			$data = get_post_meta($post_id, 'scb-coupon-expire-date', true);
			echo $data ?: 'Never';
			break;
		case 'scb_hide_expire':
			echo get_post_meta($post_id, 'scb-coupon-hide-expired', true) ? 'Yes' : 'No';
			break;
		case 'status':
			$status = get_post_status($post_id);
			$color = '';
			if ($status == 'publish')
				{
				$color = 'green';
			}
				elseif (in_array($status, ['pending', 'draft', 'expired', 'trash']))
				{
				$color = 'red';
			}

			echo ("<span style='color:$color'>".wp_deals_and_coupons()->coupons_status[$status]." </span>");
			break;
		}
	}

	function custom_filter_for_post_list()
	{
		$type = 'post';
		if (isset($_GET['post_type']))
		{
			$type = $_GET['post_type'];
		}

		if (wp_deals_and_coupons()->post_type == $type)
		{
			$current_v = isset($_GET['scb_filter_by_coupon_type']) ? $_GET['scb_filter_by_coupon_type'] : '';

			?>
        <select name="scb_filter_by_coupon_type"  id="scb_filter_by_coupon_type">
        <option value=""><?php _e('Filter By Coupon type', 'scb_dc');?></option>

                     <?php foreach (wp_deals_and_coupons()->coupons_types as $value => $label)
			{
				?>
                    <option value="<?php echo ($value); ?>" <?php echo ($current_v == $value ? 'selected' : ''); ?>>
                    <?php _e($label, 'scb_dc');?>
                    </option>
                    <?php }?>
                </select>
                <input type="text" name="scb_filter_by_coupon_type_data"  id="scb_filter_by_coupon_type_data" style="min-width: 290px;display:<?php echo (in_array($current_v, array_keys(wp_deals_and_coupons()->coupons_types)) ? 'block' : 'none'); ?>" placeholder="<?php echo ($current_v == 'coupon' ? 'Enter coupon code to search or leave blank' : 'Enter deal url to search 	or leave blank'); ?>" />



        <?php
}
	}

	function posts_filter_for_post_list($query)
	{
		global $pagenow;
		$type = 'post';
		if (isset($_GET['post_type']))
		{
			$type = $_GET['post_type'];
		}
		if (wp_deals_and_coupons()->post_type == $type && is_admin() && $pagenow == 'edit.php' && isset($_GET['scb_filter_by_coupon_type']) && $_GET['scb_filter_by_coupon_type'] != '')
		{
			$meta_search = [['key' => 'scb-coupon-type',
				'value' => $_GET['scb_filter_by_coupon_type'], // This cannot be empty because of a bug in WordPress
				'compare' => '=']];
			if (@$_GET['scb_filter_by_coupon_type_data'])
			{
				$meta_search[] = ['key' => $_GET['scb_filter_by_coupon_type'] == 'coupon' ? 'scb-coupon-code' : 'scb-coupon-deal-link',
					'value' => $_GET['scb_filter_by_coupon_type_data'], // This cannot be empty because of a bug in WordPress
					'compare' => '='];
			}

			$query->set('meta_query', $meta_search);
		}
	}

	public static function custom_post_status()
	{
		$postType = wp_deals_and_coupons()->post_type;
		$states = [

			'expired' => [
				'label' => __('Expired', 'scb_dc'),
				'public' => true,
				'exclude_from_search' => true,
				'show_in_admin_all_list' => true,
				'show_in_admin_status_list' => true,
				'label_count' => _n_noop('Expired <span class="count">(%s)</span>', 'Expired <span class="count">(%s)</span>'),
			],
		];
		foreach ($states as $id => $state)
		{
			register_post_status($id, $state);
		}

		add_action('admin_footer-post.php', function () use ($postType, $states)
		{
			global $post;
			if (!$post || $post->post_type !== $postType)
			{
				return false;
			}

			foreach ($states as $id => $state)
			{
				printf(
					'<script>'
					.'jQuery(document).ready(function($){'
					.'   $("select#post_status").append("<option value=\"%s\" %s>%s</option>");'
					.'   $("a.save-post-status").on("click",function(e){'
					.'      e.preventDefault();'
					.'      var value = $("select#post_status").val();'
					.'      $("select#post_status").value = value;'
					.'      $("select#post_status option").removeAttr("selected", true);'
					.'      $("select#post_status option[value=\'"+value+"\']").attr("selected", true)'
					.'    });'
					.'});'
					.'</script>'
					, $id
					, $post->post_status !== $id ? '' : 'selected=\"selected\"'
					, $state['label']
				);

				if ($post->post_status === $id)
				{
					printf(
						'<script>'
						.'jQuery(document).ready(function($){'
						.'   $(".misc-pub-section #post-status-display").text("%s");'
						.'});'
						.'</script>'
						, $state['label']
					);
				}
			}
		});

		add_action('admin_footer-edit.php', function () use ($states, $postType)
		{
			global $post;

			if (!$post || $post->post_type !== $postType)
			{
				return false;
			}

			foreach ($states as $id => $state)
			{
				printf(
					'<script>'
					.'jQuery(document).ready(function($){'
					." $('select[name=\"_status\"]' ).append( '<option value=\"%s\">%s</option>' );"
					.'});'
					.'</script>'
					, $id
					, $state['label']
				);
			}
		});

		add_filter('display_post_states', function ($current_states, $post) use ($states, $postType)
		{
			foreach ($states as $id => $state)
			{
				if ($post->post_type == $postType && $post->post_status === $id)
				{
					return array($state['label']);
				}
				else
				{
					if (array_key_exists($id, $states))
					{
						unset($states[$id]);
					}
				}
			}

			return $states;
		}, 10, 2);
	}

	public function create_sample_deals()
	{
		$fnRandString = function ($length)
		{
			return substr(str_shuffle(str_repeat($x = '#ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
		};
		$fnRandSound = function ($length = 6)
		{
			// consonant sounds
			$cons = array(
				// single consonants. Beware of Q, it's often awkward in words
				'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
				'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'z',
				// possible combinations excluding those which cannot start a word
				'pt', 'gl', 'gr', 'ch', 'ph', 'ps', 'sh', 'st', 'th', 'wh',
			);

			// consonant combinations that cannot start a word
			$cons_cant_start = array(
				'ck', 'cm',
				'dr', 'ds',
				'ft',
				'gh', 'gn',
				'kr', 'ks',
				'ls', 'lt', 'lr',
				'mp', 'mt', 'ms',
				'ng', 'ns',
				'rd', 'rg', 'rs', 'rt',
				'ss',
				'ts', 'tch',
			);

			// wovels
			$vows = array(
				// single vowels
				'a', 'e', 'i', 'o', 'u', 'y',
				// vowel combinations your language allows
				'ee', 'oa', 'oo',
			);

			// start by vowel or consonant ?
			$current = (mt_rand(0, 1) == '0' ? 'cons' : 'vows');

			$word = '';

			while (strlen($word) < $length)
			{
				// After first letter, use all consonant combos
				if (strlen($word) == 2)
				{
					$cons = array_merge($cons, $cons_cant_start);
				}

				// random sign from either $cons or $vows
				$rnd = ${
					$current}[mt_rand(0, count(${
					$current}) - 1)];

				// check if random sign fits in word length
				if (strlen($word.$rnd) <= $length)
				{
					$word .= $rnd;
					// alternate sounds
					$current = ($current == 'cons' ? 'vows' : 'cons');
				}
			}

			return $word;
		};
		$fnRandSoundTimes = function ($min, $max, $min1, $max1) use ($fnRandSound)
		{
			$lines = "";
			$max = rand($min, $max);
			$max1 = rand($min1, $max1);
			for ($i = 1; $i <= $max; $i++)
			{
				for ($j = 1; $j <= $max1; $j++)
				{
					$lines .= $fnRandSound(rand(3, 6))." ";
				}
				$lines = trim($lines).".";
			}

			return $lines;
		};

		$postFound = function ($title)
		{
			$the_slug = ($title);
			$args = [
				'title' => $the_slug,
				'post_type' => wp_deals_and_coupons()->post_type,
				'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'expired'),
				'numberposts' => 1,
			];
			//return  get_page_by_path($the_slug,OBJECT,wp_deals_and_coupons()->post_type );

			return (get_posts($args));
		};
		$coupon_status = wp_deals_and_coupons()->coupons_status;
		unset($coupon_status['trash']);
		unset($coupon_status['trash']);
		$coupon_status = array_keys($coupon_status);

		for ($i = 1; $i < 60; $i++)
		{
			$my_deal = [
				'post_title' => 'My awesome deal '.($i + 1),
				'post_content' => 'My awesome deal description '.$fnRandSoundTimes(1, 1, 5, 7),
				'post_status' => $coupon_status[rand(0, count($coupon_status) - 1)],
				'post_type' => wp_deals_and_coupons()->post_type,
			];
			if ($post = ($postFound($my_deal['post_title'])))
			{
				continue;
			}
			$my_deal['meta_input'] = [
				'scb-coupon-type' => 'deal',
				'scb-coupon-code' => '',
				'scb-coupon-button-text' => 'Get Deal',
				'scb-coupon-deal-link' => 'http://'.$fnRandSound(3).".com",
				'scb-coupon-text' => $fnRandSound(4),
				'scb-coupon-text-second' => $fnRandSound(3),
				'scb-coupon-terms' => "This is some terms and conditions ".$fnRandSoundTimes(1, 1, 2, 3),
				'scb-coupon-expire-date' => $my_deal['post_status'] == 'expired' ? date("d-M-Y", time() - (86400 * (rand(10, 20)))) : date("d-M-Y", time() + (86400 * (rand(10, 20)))),
				'scb-coupon-hide-expired' => rand(0, 1),

			];

			wp_insert_post($my_deal);
		}

		for ($i = 40; $i < 60; $i++)
		{
			$my_deal = [
				'post_title' => 'My awesome coupon '.($i + 1),
				'post_content' => 'My awesome coupon description '.$fnRandSoundTimes(1, 1, 5, 7),
				'post_status' => $coupon_status[rand(0, count($coupon_status) - 1)],
				'post_type' => wp_deals_and_coupons()->post_type,
			];
			if ($post = ($postFound($my_deal['post_title'])))
			{
				continue;
			}
			$my_deal['meta_input'] = [
				'scb-coupon-type' => 'coupon',
				'scb-coupon-code' => $fnRandString(5),
				'scb-coupon-button-text' => 'See code',
				'scb-coupon-deal-link' => '',
				'scb-coupon-text' => "£".rand(100, 200),
				'scb-coupon-text-second' => 'OFF',
				'scb-coupon-terms' => "This is some terms and conditions ".$fnRandSoundTimes(1, 1, 2, 3),
				'scb-coupon-expire-date' => $my_deal['post_status'] == 'expired' ? date("d-M-Y", time() - (86400 * (rand(10, 20)))) : date("d-M-Y", time() + (86400 * (rand(10, 20)))),
				'scb-coupon-hide-expired' => rand(0, 1),

			];

			wp_insert_post($my_deal);
		}
	}

	public function admin_foot_js()
	{

		global $post;
		if ($post->post_type == wp_deals_and_coupons()->post_type && @current_user_can('edit_post'))
		{
			?>
				<script>

				(function($) {
    'use strict';

    $(document).ready(function() {

 
        	 jQuery('#content-html').click();
    jQuery('#wp-content-editor-tools').remove();
    jQuery('#ed_toolbar').remove();
jQuery( "<div style='padding-top:10px; padding-bottom:5px'><label style='font-size: 14px; font-weight: 600;'>Coupon Description</label></div>" ).insertBefore( '#postdivrich' );
jQuery( "<div style='padding-top:10px; padding-bottom:5px'><label style='font-size: 14px; font-weight: 600;'>Coupon Title</label></div>" ).insertBefore( '#titlediv' );



     });
})(jQuery);

				</script>

			<?php
}
	}

	public function admin_head_css()
	{
		 
		?>

 			<style type="text/css">



			.deal-block{

				 margin-top: 5px;
				 padding: 7px;
				 border: 1px solid #ccc;
				 background:white;
				 color:#0073aa;
				 ;max-height: 16px;overflow:
				 hidden;text-overflow: ellipsis;
			}
			.deal-block-deal{
				display:block;
				max-width:200px;
			}
			.deal-block-coupon{
				display:inline-block;
			}

			</style>
		<?php
}
	function remove_mediabuttons()
	{
		global $post;

		if ($post->post_type == wp_deals_and_coupons()->post_type && @current_user_can('edit_post'))
		{
			remove_action('media_buttons', 'media_buttons');
		}
	}
}
