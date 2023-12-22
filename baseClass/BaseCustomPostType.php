<?php

/**
 * Class BaseCustomPostType
 *
 * Abstract class for creating custom post types in WordPress.
 */
abstract class BaseCustomPostType
{
    protected array $labels, $rewrite, $supports, $taxonomies;
    protected string $description, $capability_type, $post_type_key;
    protected bool $public, $publicly_queryable, $show_ui, $show_in_menu, $query_var, $has_archive, $hierarchical, $show_in_rest;
    protected $menu_position;

    /**
     * Constructor for the class.
     *
     * Initializes default values and hooks into the 'init' action to register the custom post type.
     */
    public function __construct()
    {
        // Properties that have not been initialized:  $labels, $rewrite, $description, $post_type_key
        // Properties that have been initialized
        $this->public = true;
        $this->publicly_queryable = true;
        $this->show_ui = true;
        $this->show_in_menu = true;
        $this->query_var = true;
        $this->capability_type = 'post';
        $this->has_archive = true;
        $this->hierarchical = true;
        $this->menu_position = null;
        $this->supports = ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'];
        $this->show_in_rest = false;
        $this->taxonomies = ['category', 'post_tag'];
        // Hook into the 'init' action to register the custom post type
        add_action('init', [$this, 'register_custom_post_type']);
    }

    /**
     * Method to register the custom post type with WordPress.
     */
    public function register_custom_post_type()
    {
        // Define arguments for registering the custom post type

        $args = [
            'labels' => $this->labels,    // Labels for the custom post type
            'description' => $this->description, // Description of the custom post type
            'public' => $this->public,   // Whether the custom post type is public
            'publicly_queryable' => $this->publicly_queryable,// Whether the custom post type is publicly queryable
            'show_ui' => $this->show_ui,     // Whether to show the UI for managing the custom post type in the admin
            'show_in_menu' => $this->show_in_menu,  // Whether to show the custom post type in the admin menu
            'query_var' => $this->query_var,    // Whether to include the custom post type in the main query variable
            'rewrite' => $this->rewrite,    // Settings for rewriting the custom post type permalink structure
            'capability_type' => $this->capability_type,    // The capability type for the custom post type
            'has_archive' => $this->has_archive,    // Whether the custom post type has an archive page
            'hierarchical' => $this->hierarchical,    // Whether the custom post type is hierarchical (like pages)
            'menu_position' => $this->menu_position,    // The position in the menu order the custom post type should appear
            'supports' => $this->supports,    // Features supported by the custom post type
            'taxonomies' => $this->taxonomies,    // Taxonomies associated with the custom post type
            'show_in_rest' => $this->show_in_rest    // Whether to enable the custom post type in the REST API
        ];
        // Register the custom post type with WordPress
        register_post_type($this->post_type_key, $args);
    }
}