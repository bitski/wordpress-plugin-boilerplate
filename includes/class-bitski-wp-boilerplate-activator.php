<?php

/**
 * Fired during plugin activation
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Boilerplate_Activator
{

    /**
     * Declare custom post types, taxonomies and plugin settings.
     * Flushes rewrite rules afterwards.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        require_once plugin_dir_path(
                         dirname(__FILE__)
                     ) . 'includes/class-bitski-wp-boilerplate-post-types.php';

        // Create taxonomy related to a cpt before registering that very cpt to make the taxonomy's rewrite work
        Bitski_Wp_Boilerplate_Post_Types::new_taxonomy();
        Bitski_Wp_Boilerplate_Post_Types::new_post_type();

        // Remove rewrite rules and then recreate them.
        flush_rewrite_rules();
    }

}
