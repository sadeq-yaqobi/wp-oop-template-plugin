<?php

/**
 * Abstract class for creating custom taxonomies in WordPress.
 */
abstract class BaseTaxonomy
{
    // Properties for taxonomy configuration
    protected array $labels, $rewrite, $taxonomy_object_type;
    protected bool $hierarchical, $show_ui, $show_admin_column, $query_var;
    protected string $taxonomy_key;

    /**
     * Constructor method initializes some default values for taxonomy properties.
     */
    public function __construct()
    {
        // Properties that have not been initialized:  $labels, $rewrite, $taxonomy_key, $taxonomy_object_type
        // Properties that have been initialized
        $this->hierarchical = true;
        $this->show_ui = true;
        $this->show_admin_column = true;
        $this->query_var = true;

        // Hook to WordPress initialization to register the custom taxonomy
        add_action('init', [$this, 'register_custom_taxonomy']);
    }

    /**
     * Method to register the custom taxonomy with WordPress.
     */
    public function register_custom_taxonomy()
    {
        // Configuration arguments for register_taxonomy function
        $args = [
            'hierarchical'      => $this->hierarchical,
            'labels'            => $this->labels,
            'show_ui'           => $this->show_ui,
            'show_admin_column' => $this->show_admin_column,
            'query_var'         => $this->query_var,
            'rewrite'           => $this->rewrite,
        ];

        // Register the custom taxonomy
        register_taxonomy($this->taxonomy_key, $this->taxonomy_object_type, $args);
    }
}
