<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin...
 *
 * @link              http://zardozcs.com
 * @since             1.0.0
 * @package           Zwp_Modal 
 *
 * @wordpress-plugin
 * Plugin Name:       ZWP Modal
 * Plugin URI:        https://github.com/rardoz/zwp-modal.git
 * Description:       A pop-up modal plugin for wordpress.
 * Version:           1.0.0
 * Author:            Zardoz Creative Studio 
 * Author URI:        http://zardozcs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zwp-modal
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zwp-modal-activator.php
 */
function activate_zwp_modal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zwp-modal-activator.php';
	Zwp_Modal_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zwp-modal-deactivator.php
 */
function deactivate_zwp_modal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zwp-modal-deactivator.php';
	Zwp_Modal_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zwp_modal' );
register_deactivation_hook( __FILE__, 'deactivate_zwp_modal' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zwp-modal.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zwp_modal() {

	$plugin = new Zwp_Modal();
	$plugin->run();

}
run_zwp_modal();
