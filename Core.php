<?php
/**
 * Plugin Name: sample OOP Plugin
 * Plugin URI: https://github.com/sadeq-yaqobi/
 * Description: A simple WordPress plugin demonstrating Object-Oriented Programming principles.
 * Author: Sadeq Yaqobi
 * Version: 1.0.0
 * License: GPLv2 or later
 * Author URI: https://github.com/sadeq-yaqobi/
 */

defined('ABSPATH') || exit();
include_once 'class/Menu_ExampleUser.php';
include_once 'class/MetaBox_ExampleVideoUrl.php';
include_once 'class/PostType_ExampleBook.php';
include_once 'class/Taxonomy_ExampleWriter.php';
include_once 'class/Widget_ExampleInfo.php';

/**
 * Class Core
 *
 * Main class for the OOP Plugin functionality.
 */
class Core
{
    /**
     * Constructor for the class.
     *
     * Initializes the plugin by setting up constants and calling the initialization method.
     */
    public function __construct()
    {
        $this->define_constants();
        $this->init();
    }

    /**
     * Define plugin-related constants.
     */
    public function define_constants()
    {
        define('OOP_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('OOP_PLUGIN_URL', plugin_dir_url(__FILE__));
    }

    /**
     * Initialize the plugin.
     *
     * This method registers activation and deactivation hooks, as well as asset registration actions.
     */
    public function init()
    {
        register_activation_hook(__FILE__, [$this, 'activation']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']); // Register assets on admin side
        add_action('wp_enqueue_scripts', [$this, 'register_assets']); // Register assets on front side
    }

    /**
     * Actions to perform on plugin activation.
     *
     * You can add any necessary tasks here, such as creating database tables.
     */
    public function activation()
    {
        // Add activation tasks here
    }

    /**
     * Actions to perform on plugin deactivation.
     */
    public function deactivation()
    {
        // Add deactivation tasks here
    }

    /**
     * Register and enqueue assets (CSS and JS).
     */
    public function register_assets()
    {
        // Register and enqueue CSS
        if (is_admin()) {
            // Admin styles
            wp_register_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css', '', '5.0.2');
            wp_register_style('fontawesome-icon', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css', '', '5.15.4');
            wp_enqueue_style('bootstrap-5');
            wp_enqueue_style('fontawesome-icon');
            wp_register_style('dashboard-style', plugins_url('oop-plugin/assets/css/admin.css'), '', '1.0.0');
            wp_enqueue_style('dashboard-style');
        } else {
            // Frontend styles
            wp_register_style('front-style', plugins_url('oop-plugin/assets/css/front.css'), '', '1.0.0');
            wp_enqueue_style('front-style');
        }

        // Register and enqueue JS
        if (is_admin()) {
            // Admin scripts
            wp_register_script('sweet-alert-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@11', '', '2.11.0', ['strategy' => 'async', 'in_footer' => true]);
            wp_register_script('dashboard-js', OOP_PLUGIN_URL . 'assets/js/admin.js', ['jquery'], '1.0.0', ['strategy' => 'defer', 'in_footer' => false]);
            wp_enqueue_script('sweet-alert-js');
            wp_enqueue_script('dashboard-js');
        } else {
            // Frontend scripts
            wp_register_script('front-js', OOP_PLUGIN_URL . 'assets/js/front.js', ['jquery'], '1.0.0', ['strategy' => 'defer', 'in_footer' => false]);
            wp_enqueue_script('front-js');
        }
    }

    public function load_entities()
    {
        // Load plugin entities, such as the User entity by new objects.
        new Menu_ExampleUser();
        new MetaBox_ExampleVideoUrl();
        new PostType_ExampleBook();
        new Taxonomy_ExampleWriter();
        new Widget_ExampleInfo();
    }
}

// Instantiate the Core class to initialize the plugin
$core = new Core();
