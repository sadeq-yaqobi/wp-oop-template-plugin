<?php
/**
 * The abstract BaseWidget class provides a foundation for creating custom dashboard widgets in WordPress.
 */
abstract class BaseWidget
{
    // Properties for widget configuration
    protected string $widget_id, $widget_name, $context, $priority;
    protected $control_callback, $callback_args;

    /**
     * Constructor method to initialize widget properties and set default values.
     *
     * Properties that have not been initialized: $widget_id, $widget_name
     * Properties that have been initialized: $context, $priority, $control_callback, $callback_args
     */
    public function __construct()
    {
        $this->control_callback = null;
        $this->callback_args = null;
        $this->context = 'normal';
        $this->priority = 'core';

        // Hook to add the dashboard widget during 'wp_dashboard_setup'
        add_action('wp_dashboard_setup', [$this, 'add_dashboard_widget']);
    }

    /**
     * Adds the dashboard widget using wp_add_dashboard_widget function.
     */
    public function add_dashboard_widget()
    {
        wp_add_dashboard_widget(
            $this->widget_id,
            $this->widget_name,
            [$this, 'layout'],
            $this->control_callback,
            $this->callback_args,
            $this->context,
            $this->priority
        );
    }

    /**
     * Abstract method to be implemented by child classes for defining widget layout.
     */
    abstract public function layout();
}
