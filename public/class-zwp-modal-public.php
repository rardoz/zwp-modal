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
		$this->post_name = $page_object->post_name;
		include_once( 'partials/zwp-modal-public-display.php' );
	}
}