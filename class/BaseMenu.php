<?php

/**
 * Class BaseMenu
 *
 * Abstract class for creating menus in WordPress admin using Object-Oriented Programming.
 */
abstract class BaseMenu
{
    // Defining properties for menu and submenu items
    protected string $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position;
    protected bool $has_sub_menu = false;
    protected array $sub_menu_items = [];

    /**
     * Constructor for the class.
     *
     * Initializes the capability and hooks into the 'admin_menu' action to add the main menu page.
     */
    public function __construct()
    {
        $this->capability = 'manage_options';
        add_action('admin_menu', [$this, 'add_menu_page']);
    }

    /**
     * Method to add the main menu page to the WordPress admin.
     */
    public function add_menu_page()
    {
        // WordPress function to add the main menu page on the admin side
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capability,
            $this->menu_slug,
            [$this, 'index'], // Callback function for the main menu page
            $this->icon_url,
            $this->position
        );

        // WordPress function to add submenu pages on the admin side
        if ($this->has_sub_menu) {
            foreach ($this->sub_menu_items as $item) {
                add_submenu_page(
                    $item['parent_slug'],
                    $item['page_title'],
                    $item['menu_title'],
                    $this->capability,
                    $item['menu_slug'],
                    [$this, $item['callback']], // Callback function for the submenu page
                    $item['position']
                );
            }
        }
    }

    /**
     * Abstract method to be implemented by child classes.
     *
     * This method will contain the content for the main menu page.
     */
    abstract public function index();
}
