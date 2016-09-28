<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://daviddataram.com
 * @since             1.0.0
 * @package           Contact Form Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Contact Form Plugin
 * Plugin URI:        http://daviddataram.com/plugins/contact-form-plugin
 * Description:       Wordpress Custom Contact form 
 * Version:           1.0.0
 * Author:            David Dataram
 * Author URI:        http://daviddataram.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-form-activator.php';
	Contact_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_contact_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contact-form-deactivator.php';
	Contact_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_contact_form' );
register_deactivation_hook( __FILE__, 'deactivate_contact_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-contact-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_contact_form() {

	$plugin = new ddata_Contact_Form();
	$plugin->run();
}
run_contact_form();
