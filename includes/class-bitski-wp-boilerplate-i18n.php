<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Boilerplate_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bitski-wp-boilerplate',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
