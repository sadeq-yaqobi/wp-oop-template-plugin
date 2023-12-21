<?php
include_once 'BaseSetting.php';

// Child class extending the base setting class
class Setting_ExampleGatePay extends BaseSetting
{
    // Constructor to set up specific settings
    public function __construct()
    {
        $this->option_group = 'general';
        $this->option_names = ['_merchant_ID', '_gate_pay_name'];
        $this->args = [
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => null
        ];
        $this->section_ID = 'merchant_ID_section';
        $this->section_title = '';
        $this->field_properties = [
                //properties were defined for merchant field
            [
                'field_ID' => 'merchant_ID_field',
                'field_title' => 'کلید مرچنت آی‌دی',
                'field_callback' => 'layout_merchant'
            ],
            [
                //properties were defined for gate pay field
                'field_ID' => 'gate_pay_name',
                'field_title' => 'نام درگاه پرداخت',
                'field_callback' => 'layout_gate_pay'
            ]
        ];
        $this->field_section = $this->section_ID;
        parent::__construct();
    }

    // Implementation of the abstract section callback title method
    public function section_callback_title()
    {
        // TODO: Implement section_callback_title() method.
    }

    // Layout function for merchant field
    public function layout_merchant()
    {
        $merchant_ID = get_option('_merchant_ID');
        ?>
        <input type="text" name="_merchant_ID" value="<?php echo isset($merchant_ID) ? esc_attr($merchant_ID) : '' ?>">
        <?php
    }

    // Layout function for gate pay field
    public function layout_gate_pay()
    {
        $gate_pay_name = get_option('_gate_pay_name');
        ?>
        <input type="text" name="_gate_pay_name"
               value="<?php echo isset($gate_pay_name) ? esc_attr($gate_pay_name) : '' ?>">
        <?php
    }
}