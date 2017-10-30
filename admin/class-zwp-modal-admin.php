<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://zardozcs.com
 * @since      1.0.0
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/admin
 * @author     Zardoz Creative Studio <apps@zardozcs.com>
 */
class Zwp_Modal_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zwp_Modal_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zwp_Modal_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/zwp-modal-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zwp_Modal_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zwp_Modal_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/zwp-modal-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu() {
			add_options_page( 'ZWP Modal Setup', 'ZWP Modal', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}
	
	public function add_action_links( $links ) {
		 $settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		 );
		 return array_merge(  $settings_link, $links );
	}
	
	public function display_plugin_setup_page() {
			$this->options = get_option($this->plugin_name);
			$page_ids = [];
			$post_ids = [];
			
			foreach($this->options as $key => $option) {
				if($option['post_id']) {
					$page_ids[] = $key;
					$post_ids[] = $option['post_id'];
				}
			}

			$this->pages = count($page_ids) > 0 ? get_pages(['include' => $page_ids]) : [];
			$this->posts = get_posts( ['include' => $post_ids]); 
			
			$this->current_page = null;
			include_once( 'partials/zwp-modal-admin-display.php' );
	}

	public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
  }

	public function validate($input) {
		$valid = array();
		foreach($input['pages'] as $key => $value) {
			$valid[$key] =  $value;
		}
		return $valid;
	}
	protected function get_form($page) {
		$this->current_page = $page;
		ob_start();
		include( 'partials/zwp-modal-settings.php' );
		$contents = ob_get_contents();
		ob_end_clean();
		return $contents;
	}
	
	public function ajax_listings() {
		global $wpdb;
		$this->options = get_option($this->plugin_name);
		$titles = array();

		$name = $wpdb->esc_like(stripslashes(strtolower($_POST['name']))); 
		$type = $wpdb->esc_like($_POST['type']);

		$sql = "select ID, post_title, post_type
			from $wpdb->posts 
			where post_type = '$type'
			and (lower(concat(' ', post_title, ' ', ID, ' ')) like '% $name%')
			limit 5
		";

		$sql = $wpdb->prepare($sql, $name);
		$results = $wpdb->get_results($sql);

		foreach($results as $r){
			$titles[] = [
				'title' => addslashes($r->post_title),
				'id' => $r->ID,
				'form' => json_encode($this->get_form($r))
			];
		}

		echo json_encode($titles);
		die();
	}
}
