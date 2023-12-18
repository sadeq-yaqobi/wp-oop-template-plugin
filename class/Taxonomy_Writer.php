<?php
// Include the BaseTaxonomy class for inheritance
include_once "BaseTaxonomy.php";

/**
 * Taxonomy_Writer class extends the BaseTaxonomy class to create a custom 'writer' taxonomy in WordPress.
 */
class Taxonomy_Writer extends BaseTaxonomy
{
    /**
     * Constructor method to set specific values for the 'writer' taxonomy.
     */
    public function __construct()
    {
        // Call the parent constructor to initialize common taxonomy properties
        parent::__construct();

        // Set specific values for 'writer' taxonomy
        $this->rewrite = ['slug' => 'writer'];
        $this->taxonomy_key = 'writer';
        $this->taxonomy_object_type = ['post', 'page'];

        // Labels for the 'writer' taxonomy
        $this->labels = [
            'name'                       => _x( 'Writers', 'taxonomy general name', 'textdomain' ),
            'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'textdomain' ),
            'search_items'               => __( 'Search Writers', 'textdomain' ),
            'popular_items'              => __( 'Popular Writers', 'textdomain' ),
            'all_items'                  => __( 'All Writers', 'textdomain' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit Writer', 'textdomain' ),
            'update_item'                => __( 'Update Writer', 'textdomain' ),
            'add_new_item'               => __( 'Add New Writer', 'textdomain' ),
            'new_item_name'              => __( 'New Writer Name', 'textdomain' ),
            'separate_items_with_commas' => __( 'Separate writers with commas', 'textdomain' ),
            'add_or_remove_items'        => __( 'Add or remove writers', 'textdomain' ),
            'choose_from_most_used'      => __( 'Choose from the most used writers', 'textdomain' ),
            'not_found'                  => __( 'No writers found.', 'textdomain' ),
            'menu_name'                  => __( 'Writers', 'textdomain' ),
        ];
    }
}