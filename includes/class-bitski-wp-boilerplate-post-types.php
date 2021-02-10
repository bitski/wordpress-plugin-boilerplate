<?php

/**
 * Register custom post types & related taxonomies
 *
 * @link       bitski.de
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 */

/**
 * Register custom post types & related taxonomies
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Bitski_Wp_Boilerplate
 * @subpackage Bitski_Wp_Boilerplate/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Boilerplate_Post_Types
{

    /**
     * Creates a new custom post type 'rezept'.
     *
     * @since    1.0.0
     */
    public static function new_post_type(): void
    {
        $cpt_name = 'rezept';

        $labels = [
            'name'                  => __(
                'Rezepte',
                'Post type general name',
                'textdomain'
            ),
            'singular_name'         => _x(
                'Rezept',
                'Post type singular name',
                'textdomain'
            ),
            'menu_name'             => _x(
                'Rezepte',
                'Admin Menu text',
                'textdomain'
            ),
            'name_admin_bar'        => _x(
                'Rezept',
                'Add New on Toolbar',
                'textdomain'
            ),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New Rezept', 'textdomain'),
            'new_item'              => __('New Rezept', 'textdomain'),
            'edit_item'             => __('Edit Rezept', 'textdomain'),
            'view_item'             => __('View Rezept', 'textdomain'),
            'all_items'             => __('All Rezepte', 'textdomain'),
            'search_items'          => __('Search Rezepte', 'textdomain'),
            'parent_item_colon'     => __('Parent Rezepte:', 'textdomain'),
            'not_found'             => __('No Rezepte found.', 'textdomain'),
            'not_found_in_trash'    => __(
                'No Rezepte found in Trash.',
                'textdomain'
            ),
            'featured_image'        => _x(
                'Rezept Featured Image',
                'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'set_featured_image'    => _x(
                'Set Rezept featured image',
                'Overrides the “Set featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'remove_featured_image' => _x(
                'Remove Rezept featured image',
                'Overrides the “Remove featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'use_featured_image'    => _x(
                'Use as Rezept featured image',
                'Overrides the “Use as featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'archives'              => _x(
                'Rezeptk archives',
                'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4',
                'textdomain'
            ),
            'insert_into_item'      => _x(
                'Insert into Rezept',
                'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4',
                'textdomain'
            ),
            'uploaded_to_this_item' => _x(
                'Uploaded to this Rezept',
                'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4',
                'textdomain'
            ),
            'filter_items_list'     => _x(
                'Filter Rezepte list',
                'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4',
                'textdomain'
            ),
            'items_list_navigation' => _x(
                'Rezepte list navigation',
                'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4',
                'textdomain'
            ),
            'items_list'            => _x(
                'Rezepte list',
                'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4',
                'textdomain'
            ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'rezept'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-food',
            'taxonomies'         => [],
            'supports'           => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
            ],
        ];

        register_post_type($cpt_name, $args);
    }

    /**
     * Creates a new taxonomy 'kategorie' for a custom post type 'rezept'.
     *
     * @since    1.0.0
     */
    public static function new_taxonomy(): void
    {
        $tax_name = 'kategorie';

        $labels = [
            'name'              => _x('Kategorien', 'taxonomy general name'),
            'singular_name'     => _x('Kategorie', 'taxonomy singular name'),
            'search_items'      => __('Search Kategorien'),
            'all_items'         => __('All Kategorien'),
            'parent_item'       => __('Parent Kategorie'),
            'parent_item_colon' => __('Parent Kategorie:'),
            'edit_item'         => __('Edit Kategorie'),
            'update_item'       => __('Update Kategorie'),
            'add_new_item'      => __('Add New Kategorie'),
            'new_item_name'     => __('New Kategorie Name'),
            'menu_name'         => __('Kategorien'),
        ];

        register_taxonomy(
            $tax_name,
            'rezept',
            [
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => ['slug' => 'rezept/kategorie'],
            ]
        );
    }


    /**
     * Unregister custom post type 'rezept'.
     *
     * @since    1.0.0
     */
    public static function unregister_post_type()
    {
        unregister_post_type('rezept');
    }


    /**
     * Unregister custom taxonomy 'kategorie'.
     *
     * @since    1.0.0
     */
    public static function unregister_taxonomy()
    {
        unregister_taxonomy('kategorie');
    }
}
