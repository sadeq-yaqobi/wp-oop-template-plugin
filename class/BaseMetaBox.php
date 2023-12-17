<?php

/**
 * Class BaseMetaBox
 *
 * Abstract class for creating meta boxes in WordPress admin using Object-Oriented Programming.
 */
abstract class BaseMetaBox
{
    // Defining properties for the meta box
    protected string $ID, $title, $callback, $context, $priority;
    protected $screen = null;

    /**
     * Constructor for the class.
     *
     * Initializes default values for context and priority.
     * Hooks into 'add_meta_boxes' action to add the meta box and 'save_post' action to save meta box data.
     */
    public function __construct()
    {
        $this->context = 'advanced';
        $this->priority = 'default';
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save']);
    }

    /**
     * Method to add the meta box to the WordPress admin.
     */
    public function add_meta_box()
    {
        // WordPress function to add the meta box on the specified screen
        add_meta_box(
            $this->ID,
            $this->title,
            [$this, 'layout'], // Callback function for rendering the meta box content
            $this->screen,
            $this->context,
            $this->priority
        );
    }

    /**
     * Abstract method to be implemented by child classes.
     *
     * This method will contain the HTML layout for rendering the meta box content.
     *
     * @param WP_Post $post The WordPress post object.
     */
    abstract public function layout(WP_Post $post);

    /**
     * Abstract method to be implemented by child classes.
     *
     * This method will handle the saving of meta box data.
     *
     * @param int $post_id The ID of the post being saved.
     */
    abstract public function save(int $post_id);
}
