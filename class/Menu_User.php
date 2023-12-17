<?php
include_once 'BaseMenu.php';

/**
 * Class Menu_User
 *
 * A specific implementation of a menu for managing users in the WordPress admin.
 */
class Menu_User extends BaseMenu
{
    /**
     * Constructor for the class.
     *
     * Sets up the menu properties and calls the parent constructor.
     */
    public function __construct()
    {
        // Setting up menu properties
        $this->page_title = 'صفحه مدیریت کاربران';
        $this->menu_title = 'مدیریت کاربران';
        $this->menu_slug = 'users';
        $this->icon_url = 'dashicons-admin-multisite';
        $this->position = '';
        $this->has_sub_menu = true;

        // Defining submenu items
        $this->sub_menu_items = [
            'add_user' => [
                'parent_slug' => $this->menu_slug,
                'page_title' => 'صفحه افزودن کاربر',
                'menu_title' => 'افزودن کاربر',
                'menu_slug' => 'add-user',
                'callback' => 'add_user',
                'position' => ''
            ],
            'transaction_user' => [
                'parent_slug' => $this->menu_slug,
                'page_title' => 'صفحه تراکنش های کاربر',
                'menu_title' => 'تراکنش‌های کاربر',
                'menu_slug' => 'transaction_user',
                'callback' => 'transaction_user',
                'position' => ''
            ]
        ];

        // Calling the parent constructor
        parent::__construct();
    }

    /**
     * Method to define the content of the main menu page.
     */
    public function index()
    {
        // TODO: Implement index() method.
        echo '<h1>مدیریت کاربران</h1>';
    }

    /**
     * Method to handle the 'افزودن کاربر' submenu page.
     */
    public function add_user()
    {
        // Including the view for adding a user
        include OOP_PLUGIN_DIR . 'view/admin/user/user-add-view.php';
    }

    /**
     * Method to handle the 'تراکنش‌های کاربر' submenu page.
     */
    public function transaction_user()
    {
        echo '<h1>تراکنش‌های کاربر</h1>';
    }
}
