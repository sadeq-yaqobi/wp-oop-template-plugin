<?php

// Define a class to handle AJAX requests
class AjaxHandler
{
    // Array of actions that this handler supports
    private array $actions = [
        'add_user'  // 'add_user' is a function defined in the 'users.php' trait class to handle user-related AJAX requests.
    ];
    // Constructor method
    public function __construct()
    {
        // Loop through each action and attach AJAX hooks for it
        foreach ($this->actions as $action){
            // Add an action for logged-in users
            add_action('wp_ajax_'.$action,$action);

            // Add an action for users who are not logged in
            add_action('wp_ajax_nopriv_'.$action,$action);
        }
    }
}
// Create an instance of the AjaxHandler class
new AjaxHandler();