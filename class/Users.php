<?php

trait Users
{
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