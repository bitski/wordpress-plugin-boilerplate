<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/public
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Boilerplate_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param  string  $plugin_name  The name of the plugin.
     * @param  string  $version  The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Bitski_Wp_Boilerplate_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Bitski_Wp_Boilerplate_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url(
                __FILE__
            ) . 'css/bitski-wp-boilerplate-public.css',
            [],
            $this->version,
            'all'
        );
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Bitski_Wp_Boilerplate_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Bitski_Wp_Boilerplate_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url(
                __FILE__
            ) . 'js/bitski-wp-boilerplate-public.js',
            ['jquery'],
            $this->version,
            false
        );
    }

    /**
     * Filter WP script_loader_tag.
     *
     * @since    1.0.0
     */
    public function filter_script_loader_tag($tag, $handle, $src)
    {
        if ( ! is_admin()) {
            if ('jquery-core' !== $handle) {
                return $tag;
            }
            $tag = '<script type="text/javascript" defer src="' . esc_url(
                    $src
                ) . '" id="' . $handle . '"></script>';
        }

        return $tag;
    }

    /**
     * Load local fonts @ WP header.
     *
     * @since    1.0.0
     */
    public function preload_local_fonts()
    {
        ?>
        <link rel="preload"
              href="/wp-content/themes/zur-tonne/assets/fonts/GelPenUpright.woff2"
              as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload"
              href="/wp-content/themes/zur-tonne/assets/fonts/GelPenUprightHeavy.woff2"
              as="font" type="font/woff2" crossorigin="anonymous">
        <?php
    }
}
