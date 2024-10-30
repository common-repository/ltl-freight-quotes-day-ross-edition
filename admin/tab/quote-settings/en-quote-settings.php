<?php

/**
 * Quote settings detail array.
 */

namespace EnDayrossQuoteSettings;

if (!class_exists('EnDayrossQuoteSettings')) {

    class EnDayrossQuoteSettings
    {

        /**
         * Quote Settings Html
         * @return array
         */
        static public function Load()
        {
            $en_settings = json_decode(EN_DAYROSS_SET_QUOTE_SETTINGS, true);
            $number_of_options = [];
            if (isset($en_settings['enable_carriers']) && !empty($en_settings['enable_carriers'])) {
                for ($c = 1; $c <= count($en_settings['enable_carriers']); $c++) {
                    $number_of_options[$c] = __($c, $c);
                }
            }

            $ltl_enable = get_option('en_plugins_return_LTL_quotes');
            $weight_threshold_class = $ltl_enable == 'yes' ? 'show_en_weight_threshold_lfq' : 'hide_en_weight_threshold_lfq';
            $weight_threshold = get_option('en_weight_threshold_lfq');
            $weight_threshold = isset($weight_threshold) && $weight_threshold > 0 ? $weight_threshold : 150;

            $settings = array(
                'en_quote_settings_start_dayross' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'title',
                    'id' => 'en_quote_settings_dayross',
                ],
                'en_quote_settings_custom_label_dayross' => [
                    'name' => __('Label As ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'desc' => __('What the user sees during checkout, e.g "Freight" leave blank to display the carrier name.', 'woocommerce-settings-dayross'),
                    'id' => 'en_quote_settings_custom_label_dayross'
                ],
                /**
                 * ==================================================================
                 * Rating Method End
                 * ==================================================================
                 */
                'en_quote_settings_show_delivery_estimate_dayross' => [
                    'name' => __('Show Delivery Estimate ', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'id' => 'en_quote_settings_show_delivery_estimate_dayross'
                ],
                'residential_delivery_options_label' => [
                    'name' => __('Residential Delivery', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'id' => 'en_quote_settings_residential_label_dayross'
                ],
                'en_quote_settings_residential_delivery_dayross' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'desc' => 'Always quote as residential delivery',
                    'id' => 'en_quote_settings_residential_delivery_dayross'
                ],
                /**
                 * ==================================================================
                 * Auto-detect residential addresses notification
                 * ==================================================================
                 */
                'avaibility_auto_residential' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'desc' => "Click <a target='_blank' href='" . EN_DAYROSS_RAD_URL . "'>here</a> to add the Auto-detect residential addresses module. (<a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/#documentation'>Learn more</a>)",
                    'id' => 'en_quote_settings_availability_auto_residential_dayross'
                ],
                'liftgate_delivery_options_label' => [
                    'name' => __('Lift Gate Delivery ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'id' => 'en_quote_settings_liftgate_label_dayross'
                ],
                'en_quote_settings_liftgate_delivery_dayross' => [
                    'name' => __('Always quote lift gate delivery', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'class' => 'liftgate_accessorial_action',
                    'desc' => '',
                    'id' => 'en_quote_settings_liftgate_delivery_dayross',
                ],
                'dayross_liftgate_delivery_as_option' => [
                    'name' => __('Offer lift gate delivery as an option', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'class' => 'liftgate_accessorial_action',
                    'id' => 'dayross_liftgate_delivery_as_option',
                ],
                'en_woo_addons_liftgate_with_auto_residential' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'desc' => 'Always include lift gate delivery when a residential address is detected',
                    'class' => 'liftgate_accessorial_action en_woo_addons_liftgate_with_auto_residential_dayross',
                    'id' => 'en_woo_addons_liftgate_with_auto_residential',
                ],
                /**
                 * ==================================================================
                 * Liftgate notification
                 * ==================================================================
                 */
                'avaibility_lift_gate' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'desc' => "Click <a target='_blank' href='" . EN_DAYROSS_RAD_URL . "'>here</a> to add the Residential Address Detection module. (<a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/#documentation'>Learn more</a>)",
                    'id' => 'en_quote_settings_availability_liftgate_dayross'
                ],
                'en_quote_settings_overlength_dayross' => [
                    'name' => __('Overlength Fees ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'id' => 'en_quote_settings_overlength_dayross'
                ],
                'en_quote_settings_overlength_range_1_dayross' => [
                    'name' => __('96 inches to 143 inches ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => '85',
                    'placeholder' => '85',
                    'class' => 'en_quote_settings_overlength_dayross',
                    'id' => 'en_quote_settings_overlength_range_1_dayross'
                ],
                'en_quote_settings_overlength_range_2_dayross' => [
                    'name' => __('144 inches to 191 inches ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => '150',
                    'placeholder' => '150',
                    'class' => 'en_quote_settings_overlength_dayross',
                    'id' => 'en_quote_settings_overlength_range_2_dayross'
                ],
                'en_quote_settings_overlength_range_3_dayross' => [
                    'name' => __('192 inches to 239 inches ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => '250',
                    'placeholder' => '250',
                    'class' => 'en_quote_settings_overlength_dayross',
                    'id' => 'en_quote_settings_overlength_range_3_dayross'
                ],
                'en_quote_settings_overlength_range_4_dayross' => [
                    'name' => __('240 inches to 287 inches ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => '285',
                    'placeholder' => '285',
                    'class' => 'en_quote_settings_overlength_dayross',
                    'id' => 'en_quote_settings_overlength_range_4_dayross'
                ],
                'en_quote_settings_overlength_range_5_dayross' => [
                    'name' => __('>=288 ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => '770',
                    'placeholder' => '770',
                    'class' => 'en_quote_settings_overlength_dayross',
                    'id' => 'en_quote_settings_overlength_range_5_dayross'
                ],
                'en_quote_settings_handling_unit_weight_heading_dayross' => [
                    'name' => __('Handling Unit ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'class' => 'hidden',
                    'id' => 'en_quote_settings_handling_unit_weight_heading_dayross'
                ],
                'en_quote_settings_handling_unit_weight_dayross' => [
                    'name' => __('Weight of Handling Unit ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'desc' => 'Enter in pounds the weight of your pallet, skid, crate or other type of handling unit.',
                    'id' => 'en_quote_settings_handling_unit_weight_dayross'
                ],
                'en_quote_settings_max_handling_unit_weight_dayross' => [
                    'name' => __('Maximum Weight per Handling Unit ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'desc' => 'Enter in pounds the maximum weight that can be placed on the handling unit.',
                    'id' => 'en_quote_settings_max_handling_unit_weight_dayross'
                ],
                'en_quote_settings_handling_fee_dayross' => [
                    'name' => __('Handling Fee / Markup ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'desc' => 'Amount excluding tax. Enter an amount, e.g 3.75, or a percentage, e.g, 5%. Leave blank to disable.',
                    'id' => 'en_quote_settings_handling_fee_dayross'
                ],
                'en_quote_settings_enable_logs' => [
                    'name' => __("Enable Logs  ", 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'desc' => 'When checked, the Logs page will contain up to 25 of the most recent transactions.',
                    'id' => 'en_quote_settings_enable_logs'
                ],    
                'en_quote_settings_own_arrangment_dayross' => [
                    'name' => __('Allow For Own Arrangement ', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'desc' => __('<span class="description">Adds an option in the shipping cart for users to indicate that they will make and pay for their own LTL shipping arrangements.</span>', 'woocommerce-settings-dayross'),
                    'id' => 'en_quote_settings_own_arrangment_dayross'
                ],
                'en_quote_settings_text_for_own_arrangment_dayross' => [
                    'name' => __('Text For Own Arrangement ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'desc' => '',
                    'default' => "I'll arrange my own freight",
                    'id' => 'en_quote_settings_text_for_own_arrangment_dayross'
                ],
                'en_quote_settings_allow_other_plugins_dayross' => [
                    'name' => __('Show WooCommerce Shipping Options ', 'woocommerce-settings-dayross'),
                    'type' => 'select',
                    'default' => '3',
                    'desc' => __('Enabled options on WooCommerce Shipping page are included in quote results.', 'woocommerce-settings-dayross'),
                    'id' => 'en_quote_settings_allow_other_plugins_dayross',
                    'options' => [
                        'yes' => __('YES', 'YES'),
                        'no' => __('NO', 'NO'),
                    ]
                ],
                'en_plugins_return_LTL_quotes' => [
                    'name' => __('Return LTL quotes when an order parcel shipment weight exceeds the weight threshold ', 'woocommerce-settings-dayross'),
                    'type' => 'checkbox',
                    'desc' => '<span class="description" >When checked, the LTL Freight Quote will return quotes when an order’s total weight exceeds the weight threshold (the maximum permitted by WWE and UPS), even if none of the products have settings to indicate that it will ship LTL Freight. To increase the accuracy of the returned quote(s), all products should have accurate weights and dimensions. </span>',
                    'id' => 'en_plugins_return_LTL_quotes'
                ],
                // Weight threshold for LTL freight
                'en_weight_threshold_lfq' => [
                    'name' => __('Weight threshold for LTL Freight Quotes ', 'woocommerce-settings-dayross'),
                    'type' => 'text',
                    'default' => $weight_threshold,
                    'class' => $weight_threshold_class,
                    'id' => 'en_weight_threshold_lfq'
                ],
                'en_suppress_parcel_rates' => array(
                    'name' => __("", 'woocommerce-settings-dayross'),
                    'type' => 'radio',
                    'default' => 'display_parcel_rates',
                    'options' => array(
                        'display_parcel_rates' => __("Continue to display parcel rates when the weight threshold is met.", 'woocommerce'),
                        'suppress_parcel_rates' => __("Suppress parcel rates when the weight threshold is met.", 'woocommerce'),
                    ),
                    'class' => 'en_suppress_parcel_rates',
                    'id' => 'en_suppress_parcel_rates',
                ),
                /**
                 * ==================================================================
                 * When plugin fail return to rate
                 * ==================================================================
                 */
                'en_quote_settings_clear_both_dayross' => [
                    'title' => __('', 'woocommerce'),
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'desc' => '',
                    'id' => 'en_quote_settings_clear_both_dayross',
                    'css' => '',
                    'default' => '',
                    'type' => 'title',
                ],
                'en_quote_settings_unable_retrieve_shipping_dayross' => [
                    'name' => __('Checkout options if the plugin fails to return a rate ', 'woocommerce-settings-dayross'),
                    'type' => 'title',
                    'desc' => '<span> When the plugin is unable to retrieve shipping quotes and no other shipping options are provided by an alternative source: </span>',
                    'id' => 'en_quote_settings_unable_retrieve_shipping_dayross',
                ],
                'en_quote_settings_option_select_when_unable_retrieve_shipping_dayross' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'radio',
                    'id' => 'en_quote_settings_option_select_when_unable_retrieve_shipping_dayross',
                    'options' => [
                        'allow' => __('Allow user to continue to check out and display this message', 'woocommerce-settings-dayross'),
                        'prevent' => __('Prevent user from checking out and display this message', 'woocommerce-settings-dayross'),
                    ]
                ],
                'en_quote_settings_checkout_error_message_dayross' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'textarea',
                    'desc' => 'Enter a maximum of 250 characters.',
                    'id' => 'en_quote_settings_checkout_error_message_dayross'
                ],
                'en_quote_settings_end_dayross' => [
                    'type' => 'sectionend',
                    'id' => 'en_quote_settings_end_dayross'
                ],
            );

            return $settings;
        }

    }

}