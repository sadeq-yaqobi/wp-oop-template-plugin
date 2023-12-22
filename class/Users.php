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
//        echo $_POST['userName'];
        // TODO: Implement the logic to handle the 'add_user' action
       /* if (wp_verify_nonce($_POST['_nonce'])) {
            echo '<script>alert("nonce worked")</script>';
        }*/
        // The 'add_user' function in this context should contain the specific logic to process the AJAX request.
        // Example: echo json_encode(['status' => 'success']);
        // Note: Replace this with your actual logic
       // wp_die(); // Terminate the script to complete the AJAX request
        //write your logic code to insert user data in database and response the request with  wp_send_json(); method
    }

}