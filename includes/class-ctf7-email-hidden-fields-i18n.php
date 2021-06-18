<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://antonstudio.com
 * @since      1.0.0
 *
 * @package    Ctf7_Email_Hidden_Fields
 * @subpackage Ctf7_Email_Hidden_Fields/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ctf7_Email_Hidden_Fields
 * @subpackage Ctf7_Email_Hidden_Fields/includes
 * @author     Stanley Lau <stanleyyylau@gmail.com>
 */
class Ctf7_Email_Hidden_Fields_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ctf7-email-hidden-fields',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
