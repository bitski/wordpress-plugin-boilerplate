<?php

/**
 * Fired during plugin deactivation
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's
 * deactivation.
 *
 * @since      1.0.0
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Boilerplate_Deactivator
{


    /**
     * Unregister custom post types, taxonomies.
     * Flushes rewrite rules afterwards.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate(): void
    {
        require_once plugin_dir_path(
                         dirname(__FILE__)
                     ) . 'includes/class-bitski-wp-boilerplate-post-types.php';

        // Unregister the taxonomy & post type, so the rules are no longer in memory
        Bitski_Wp_Boilerplate_Post_Types::unregister_taxonomy();
        Bitski_Wp_Boilerplate_Post_Types::unregister_post_type();

        // Remove rewrite rules to delete taxonomy's & post type's rules from the database and then recreate them.
        flush_rewrite_rules();
    }

}
