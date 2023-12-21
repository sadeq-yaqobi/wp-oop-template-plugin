<?php

// Base class providing a structure for settings
abstract class BaseSetting
{
    protected string $option_group, $section_ID, $section_title, $field_section;
    protected array $args = [], $option_names = [], $section_args = [], $field_args = [], $field_properties = [['field_ID', 'field_title', 'field_callback']];

    // Constructor to set up actions on admin_init
    public function __construct()
    {
        add_action('admin_init', [$this, 'register_init_setting']);
    }

    // Method to register settings, sections, and fields
    public function register_init_setting()
    {
        // Register each option name
        foreach ($this->option_names as $option_name) {
            register_setting(
                $this->option_group,
                $option_name,
                $this->args
            );
        }

        // Add a settings section with its callback
        add_settings_section(
            $this->section_ID,
            $this->section_title,
            [$this, 'section_callback_title'],
            $this->option_group,
            $this->section_args
        );

        // Add fields for each property in field_properties array
        foreach ($this->field_properties as $item) {
            add_settings_field(
                $item['field_ID'],
                $item['field_title'],
                [$this, $item['field_callback']],
                $this->option_group,
                $this->field_section,
                $this->field_args
            );
        }
    }

    // Abstract method for section callback title
    abstract public function section_callback_title();
}
