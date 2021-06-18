<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://antonstudio.com
 * @since             1.0.0
 * @package           Ctf7_Email_Hidden_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       Send ctf7 Email With Hidden Fields
 * Plugin URI:        https://antonstudio.com/cf7-email-hidden-fields
 * Description:       Allow you to send copies of contact form7 emails with certain fields hidden
 * Version:           1.0.0
 * Author:            Anton Studio
 * Author URI:        https://antonstudio.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ctf7-email-hidden-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CTF7_EMAIL_HIDDEN_FIELDS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ctf7-email-hidden-fields-activator.php
 */
function activate_ctf7_email_hidden_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctf7-email-hidden-fields-activator.php';
	Ctf7_Email_Hidden_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ctf7-email-hidden-fields-deactivator.php
 */
function deactivate_ctf7_email_hidden_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ctf7-email-hidden-fields-deactivator.php';
	Ctf7_Email_Hidden_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ctf7_email_hidden_fields' );
register_deactivation_hook( __FILE__, 'deactivate_ctf7_email_hidden_fields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ctf7-email-hidden-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ctf7_email_hidden_fields() {

	$plugin = new Ctf7_Email_Hidden_Fields();
	$plugin->run();

}
run_ctf7_email_hidden_fields();

/*
 * Github Updater
 */
include_once('updater.php');
if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
    $config = array(
        'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
        'proper_folder_name' => 'ctf7-email-hidden-fields', // this is the name of the folder your plugin lives in
        'api_url' => 'https://api.github.com/repos/stanleyyylau/ctf7-email-hidden-fields', // the GitHub API url of your GitHub repo
        'raw_url' => 'https://raw.github.com/stanleyyylau/ctf7-email-hidden-fields/master', // the GitHub raw url of your GitHub repo
        'github_url' => 'https://github.com/stanleyyylau/ctf7-email-hidden-fields', // the GitHub url of your GitHub repo
        'zip_url' => 'https://github.com/stanleyyylau/ctf7-email-hidden-fields/archive/refs/heads/master.zip', // the zip url of the GitHub repo
        'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
        'requires' => '5.7', // which version of WordPress does your plugin require?
        'tested' => '5.7', // which version of WordPress is your plugin tested up to?
        'readme' => 'README.md', // which file to use as the readme for the version number
        'access_token' => '', // Access private repositories by authorizing under Plugins > GitHub Updates when this example plugin is installed
    );
    new WP_GitHub_Updater($config);
}