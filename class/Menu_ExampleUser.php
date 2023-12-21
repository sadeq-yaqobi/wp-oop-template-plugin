<?php
include_once 'BaseMenu.php';
include_once 'Users.php';

/**
 * Class Menu_ExampleUser
 *
 * A specific implementation of a menu for managing users in the WordPress admin.
 */
class Menu_ExampleUser extends BaseMenu
{
    use Users;
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
    
}
