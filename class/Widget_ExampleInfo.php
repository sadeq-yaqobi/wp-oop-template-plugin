<?php
/**
 * The Widget_ExampleInfo class extends the abstract BaseWidget class, creating a custom dashboard widget in WordPress.
 */


class Widget_ExampleInfo extends BaseWidget
{
    /**
     * Constructor method to set properties inherited from the BaseWidget class.
     */
    public function __construct()
    {
        parent::__construct();
        $this->widget_id = 'dashboard_info';
        $this->widget_name = 'اطلاعات عمومی'; // Persian: General Information
    }

    /**
     * Implementation of the layout() method from the BaseWidget class.
     * Displays the content of the custom dashboard widget.
     */
    public function layout()
    {
        // TODO: Implement layout() method.
        echo "<h3>info widget was created</h3>";
    }
}
