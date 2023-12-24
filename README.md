# OOP Plugin - Object-Oriented WordPress Plugin

## Overview

This WordPress plugin serves as a demonstration of Object-Oriented Programming (OOP) principles, offering a foundation for building modular and maintainable plugins. It provides a structured approach to creating custom post types, menus, meta boxes, taxonomies, widgets, and settings.

## Table of Contents

- [Introduction](#introduction)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
    - [Extending Abstract Classes](#extending-abstract-classes)
    - [Handling AJAX Requests](#handling-ajax-requests)
- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Contributing](#contributing)
- [Conclusion](#conclusion)
- [License](#license)
- [Author](#author)

## Introduction

This WordPress plugin serves as a sample project to showcase the implementation of Object-Oriented Programming (OOP) principles in WordPress development. The plugin is organized into three main parts: Core, BaseClass, and Class.

## Project Structure

### Core Structure

- **Core.php:** Main class for initializing the plugin, setting up constants, and handling activation, deactivation, and asset registration.
- **AutoLoad.php:** Autoload class for automatic loading of other classes.

### BaseClass Folder

- **BaseCustomPostType.php:** Abstract class for creating custom post types.
- **BaseMenu.php:** Abstract class for creating menus in the WordPress admin.
- **BaseMetaBox.php:** Abstract class for creating meta boxes in the WordPress admin.
- **BaseSetting.php:** Abstract class providing a structure for settings.
- **BaseTaxonomy.php:** Abstract class for creating custom taxonomies.
- **BaseWidget.php:** Abstract class for creating custom dashboard widgets.

### Class Folder

- **AjaxHandler.php:** Class handling AJAX requests.
- **Menu_ExampleUser.php:** Specific implementation of a menu for managing users.
- **MetaBox_ExampleVideoUrl.php:** Specific implementation of a meta box for handling video URLs in posts.
- **PostType_ExampleBook.php:** Specific implementation of a custom post type for books.
- **Setting_ExampleGatePay.php:** Example of extending the base setting class to create specific settings.
- **Taxonomy_ExampleWriter.php:** Specific implementation of a custom taxonomy for writers.
- **Widget_ExampleInfo.php:** Specific implementation of a custom dashboard widget.

## Installation

1. Clone the repository: `git clone https://github.com/sadeq-yaqobi/wp-oop-plugin.git`
2. Upload the `wp-oop-plugin` directory to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

1. After activating the plugin, navigate to the WordPress admin dashboard.
2. Explore the provided menu, meta box, and custom post type functionalities.
3. Customize and extend the plugin according to your project requirements.

## Getting Started

### Extending Abstract Classes

1. **Custom Post Type:**
    - Create a new class extending `BaseCustomPostType`.
    - Set specific values for your custom post type in the constructor.

2. **Custom Menu:**
    - Create a new class extending `BaseMenu`.
    - Set up the menu properties and define submenu items in the constructor.

3. **Custom Meta Box:**
    - Create a new class extending `BaseMetaBox`.
    - Set specific values for the meta box in the constructor.

4. **Custom Taxonomy:**
    - Create a new class extending `BaseTaxonomy`.
    - Set specific values for the taxonomy in the constructor.

5. **Custom Widget:**
    - Create a new class extending `BaseWidget`.
    - Set specific values for the widget in the constructor.

6. **Custom Setting:**
    - Create a new class extending `BaseSetting`.
    - Set specific values for the setting in the constructor.

### Handling AJAX Requests

1. **Create a new Action:**
    - Add an action name to the `$actions` array in the `AjaxHandler` class.

2. **Define Action Logic:**
    - Create a function with the same name as your action in the appropriate class or trait.

3. **Call AJAX in JavaScript:**
    - Use the `wp_ajax` or `wp_ajax_nopriv` action in your JavaScript to make the AJAX request.

## Features

- Demonstrates the use of Object-Oriented Programming in WordPress.
- Provides a structured approach to creating custom post types, menus, meta boxes, taxonomies, settings, and widgets.
- Includes examples of specific implementations for users, video URLs, books, writers, and dashboard widgets.

## Contributing

Contributions are welcome! Feel free to open issues or submit pull requests.

## Conclusion

By extending the provided abstract classes and leveraging the OOP principles demonstrated in this plugin, you can create modular, maintainable, and extensible WordPress plugins with ease. Customize each component to fit your project's requirements and build powerful, organized solutions for your WordPress development.

## License

This project is licensed under the GNU General Public License v2 or later - see the LICENSE file for details.

## Author

Sadeq Yaqobi
