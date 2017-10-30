<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://zardozcs.com
 * @since      1.0.0
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Zwp_Modal
 * @subpackage Zwp_Modal/public
 * @author     Zardoz Creative Studio <apps@zardozcs.com>
 */
class Zwp_Modal_Public {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->zwp_modal_options = get_option($this->plugin_name);
	}

	public function show_modal(){
		$page_object = get_queried_object();
		$this->page_id = get_queried_object_id();
		$this->page_name = $page_object->post_name;
		if($this->zwp_modal_options[$this->page_id] && $this->zwp_modal_options[$this->page_id]['post_id'] && !$this->get_cookie()) {
			$this->set_cookie($this->zwp_modal_options[$this->page_id]['cookie_time']);
			$this->options = $this->zwp_modal_options[$this->page_id];
			$this->post = $post = get_post( $this->options['post_id'] );
			include_once( 'partials/zwp-modal-public-display.php' );
		}
	}

	protected function set_cookie($days = -1){
		setcookie(
			$this->plugin_name.'-'.$this->page_name,
			$this->zwp_modal_options[$this->page_id]['post_id'],
			time() +  (86400 * $days) 
		);
	}

	protected function get_cookie(){
		$cookie = filter_var(
			$_COOKIE[$this->plugin_name.'-'.$this->page_name]
		);
		return $cookie && $cookie == $this->zwp_modal_options[$this->page_id]['post_id'];
	}
}