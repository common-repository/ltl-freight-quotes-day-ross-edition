<?php
/**
 * Product detail page.
 * Add and show simple and variable products.
 * Class EnUpdateProductNestedOptions
 * @package EnUpdateProductNestedOptions
 */
if (!class_exists('EnUpdateProductNestedOptions')) {

    class EnUpdateProductNestedOptions
    {
        // Insurance
        public $nesting_disabled_plan = '';
        public $nesting_plan_required = '';
        public $hazardous_disabled_plan = '';
        public $hazardous_plan_required = '';
        public $is_woo_paymant_installed = false;
        /**
         * Hook for call.
         * EnUpdateProductNestedOptions constructor.
         */
        public function __construct($action)
        {
            add_filter('en_app_common_plan_status', [$this, 'en_dayross_freight_plan_status'], 10, 1);

            // Check compatible with optimized product fields methods.
            add_filter('en_compatible_optimized_product_options', [$this, 'en_compatible_other_eniture_plugins']);
            $this->dayross_nest_check_if_woo_payment_and_subscription_plugin_installed();
            if (!has_filter('en_nesting_filter')) {
                // Add simple product fields
                add_action('woocommerce_product_options_shipping', [$this, 'en_show_product_fields'], 101, 3);
                add_action('woocommerce_process_product_meta', [$this, 'en_save_product_fields'], 101, 1);

                // Add variable product fields.
                add_action('woocommerce_product_after_variable_attributes', [$this, 'en_show_product_fields'], 101, 3);
                add_action('woocommerce_save_product_variation', [$this, 'en_save_product_fields'], 101, 1);

                // Check compatible with our old eniture plugins.
                 add_filter('en_nesting_filter', [$this, 'en_compatible_other_eniture_plugins']);
            }
        }

        /**
         * Transportation insight plan status
         * @param array $plan_status
         * @return array
         */
        public function en_dayross_freight_plan_status($plan_status)
        {
            $en_plugin_name = 'LTL Freight Quotes - Day & Ross Edition';

            // Nesting plan status
            $plan_required = '0';
            $nesting_status = $en_plugin_name . ': Enabled.';
            $nesting = apply_filters("dayross_plans_suscription_and_features", 'nested_material');
            if (is_array($nesting)) {
                $plan_required = '1';
                $nesting_status = $en_plugin_name . ': Upgrade to Advanced Plan to enable.';
            }

            $plan_status['nesting']['dayross_freight'][] = 'dayross_freight';
            $plan_status['nesting']['plan_required'][] = $plan_required;
            $plan_status['nesting']['status'][] = $nesting_status;

            return $plan_status;
        }

        /**
         * Restrict to show duplicate fields on product detail page.
         */
        public function en_compatible_other_eniture_plugins()
        {
            return true;
        }

        /**
         * Show product fields in variation and simple product.
         * @param array $loop
         * @param array $variation_data
         * @param array $variation
         */
        public function en_show_product_fields($loop, $variation_data = [], $variation = [])
        {
            $postId = (isset($variation->ID)) ? $variation->ID : get_the_ID();
            if ($this->is_woo_paymant_installed) {
                echo '</div>';
                $this->en_custom_product_fields($postId);
                echo '<div>';
            } else {
                $this->en_custom_product_fields($postId);
            }
        }

        /**
         * Save the simple product fields.
         * @param int $postId
         */
        public function en_save_product_fields($postId)
        {
            if (isset($postId) && $postId > 0) {
                $en_product_fields = $this->en_product_fields_arr();
                foreach ($en_product_fields as $key => $custom_field) {
                    $custom_field = (isset($custom_field['id'])) ? $custom_field['id'] : '';
                    $en_updated_product = (isset($_POST[$custom_field][$postId])) ? $_POST[$custom_field][$postId] : '';
                    $en_updated_product = $custom_field == '_nestedDimension' || $custom_field == '_nestedStakingProperty' ?
                        (maybe_serialize(is_array($en_updated_product) ? array_map('intval', $en_updated_product) : $en_updated_product)) : esc_attr($en_updated_product);
                    update_post_meta($postId, $custom_field, $en_updated_product);
                }
            }
        }

        /**
         * Product Fields Array
         * @return array
         */
        public function en_product_fields_arr()
        {
            $en_product_fields = [
                [
                    'type' => 'checkbox',
                    'id' => '_nestedMaterials',
                    'class' => '_nestedMaterials ' . $this->nesting_disabled_plan,
                    'label' => 'Nested material',
                    'description' => $this->nesting_plan_required
                ],
                [
                    'type' => 'input_field',
                    'id' => '_nestedPercentage',
                    'class' => '_nestedPercentage en_nested_feature ' . $this->nesting_disabled_plan,
                    'label' => 'Nesting(%)',
                    'description' => 'How much of the item can be nested into another. Default 0, Range from 0 to 100.'
                ],
                [
                    'type' => 'dropdown',
                    'id' => '_nestedDimension',
                    'class' => '_nestedDimension en_nested_feature ' . $this->nesting_disabled_plan,
                    'label' => 'Nested dimension',
                    'options' => [
                        'length' => 'Length',
                        'width' => 'Width',
                        'height' => 'Height'
                    ],
                    'description' => 'This setting identifies which dimension will be used for the nesting property.'
                ],
                [
                    'type' => 'input_field',
                    'id' => '_maxNestedItems',
                    'class' => '_maxNestedItems en_nested_feature ' . $this->nesting_disabled_plan,
                    'label' => 'Maximum nested items',
                    'description' => 'It represents the maximum number of items that can be nested into one another.'
                ],
                [
                    'type' => 'dropdown',
                    'id' => '_nestedStakingProperty',
                    'class' => '_nestedStakingProperty en_nested_feature ' . $this->nesting_disabled_plan,
                    'label' => 'Stacking property',
                    'options' => [
                        'Evenly' => 'Evenly',
                        'Maximized' => 'Maximized',
                    ],
                    'description' => 'This setting identifies how the nested stacks should be handled if the total number of items exceeds the maximum.'
                ],
                [
                    'type' => 'checkbox',
                    'id' => '_hazardousmaterials',
                    'line_item' => 'isHazmatLineItem',
                    'class' => '_en_hazardous_material ' . $this->hazardous_disabled_plan,
                    'label' => 'Hazardous material',
                    'plans' => 'hazardous_material',
                    'description' => $this->hazardous_plan_required,
                ]
            ];

            // We can use hook for add new product field from other plugin add-on
            $en_product_fields = apply_filters('en_product_fields', $en_product_fields);
            return $en_product_fields;
        }

        /**
         * Common plans status
         */
        public function en_app_common_plan_status()
        {
            $plan_status = apply_filters('en_app_common_plan_status', []);

            // Nesting plan status
            if (isset($plan_status['nesting'])) {
                if (!in_array(0, $plan_status['nesting']['plan_required'])) {
                    $this->nesting_disabled_plan = 'disabled_me';
                    $this->nesting_plan_required = apply_filters("dayross_plans_notification_link", [3]);
                } elseif (isset($plan_status['nesting']['status'])) {
                    $this->nesting_plan_required = implode(" <br>", $plan_status['nesting']['status']);
                }
            }
            // Hazardous plan status
            if (isset($plan_status['hazardous_material'])) {
                if (!in_array(0, $plan_status['hazardous_material']['plan_required'])) {
                    $this->hazardous_disabled_plan = 'en_disabled_plan';
                    $this->hazardous_plan_required = apply_filters("dayross_plans_notification_link", [2, 3]);
                } elseif (isset($plan_status['hazardous_material']['status'])) {
                    $this->hazardous_plan_required = implode(" <br>", $plan_status['hazardous_material']['status']);
                }
            }
        }

        /**
         * Show Product Fields
         * @param int $postId
         */
        public function en_custom_product_fields($postId)
        {
            $this->en_app_common_plan_status();
            $en_product_fields = $this->en_product_fields_arr();

            foreach ($en_product_fields as $key => $custom_field) {
                $en_field_type = (isset($custom_field['type'])) ? $custom_field['type'] : '';
                $en_action_function_name = 'en_product_' . $en_field_type;

                if (method_exists($this, $en_action_function_name)) {
                    echo ($this->is_woo_paymant_installed) ? '<div>' : '';
                    $this->$en_action_function_name($custom_field, $postId);
                    echo ($this->is_woo_paymant_installed) ? '</div>' : '';
                }
            }
        }

        /**
         * Dynamic checkbox field show on product detail page
         * @param array $custom_field
         * @param int $postId
         */
        public function en_product_checkbox($custom_field, $postId)
        {
            $custom_checkbox_field = [
                'id' => $custom_field['id'] . '[' . $postId . ']',
                'value' => get_post_meta($postId, $custom_field['id'], true),
                'label' => $custom_field['label'],
                'class' => $custom_field['class'],
            ];

            if (isset($custom_field['description'])) {
                $custom_checkbox_field['description'] = $custom_field['description'];
            }
            echo '<div>';
            woocommerce_wp_checkbox($custom_checkbox_field);
            echo '</div>';
        }

        /**
         * Dynamic dropdown field show on product detail page
         * @param array $custom_field
         * @param int $postId
         */
        public function en_product_dropdown($custom_field, $postId)
        {
            $get_meta = get_post_meta($postId, $custom_field['id'], true);
            $assigned_option = is_serialized($get_meta) ? maybe_unserialize($get_meta) : $get_meta;
            $custom_dropdown_field = [
                'id' => $custom_field['id'] . '[' . $postId . ']',
                'label' => $custom_field['label'],
                'class' => $custom_field['class'],
                'value' => $assigned_option,
                'options' => $custom_field['options']
            ];

            if (isset($custom_field['description'])) {
                $custom_dropdown_field['desc_tip'] = true;
                $custom_dropdown_field['description'] = $custom_field['description'];
            }
            echo '<div>';
            woocommerce_wp_select($custom_dropdown_field);
            echo '</div>';
        }

        /**
         * Dynamic input field show on product detail page
         * @param array $custom_field
         * @param int $postId
         */
        public function en_product_input_field($custom_field, $postId)
        {
            $custom_input_field = [
                'id' => $custom_field['id'] . '[' . $postId . ']',
                'label' => $custom_field['label'],
                'class' => $custom_field['class'],
                'placeholder' => $custom_field['label'],
                'value' => get_post_meta($postId, $custom_field['id'], true)
            ];

            if (isset($custom_field['description'])) {
                $custom_input_field['desc_tip'] = true;
                $custom_input_field['description'] = $custom_field['description'];
            }
            echo '<div>';
            woocommerce_wp_text_input($custom_input_field);
            echo '</div>';
        }
        /**
         * This function checks either woocommerce Paymnet or Subscription plugins installed or not
         * and update class variable respectively
         */
        public function dayross_nest_check_if_woo_payment_and_subscription_plugin_installed()
        {
            $all_plugins = apply_filters('active_plugins', get_option('active_plugins'));
            if (!function_exists('is_plugin_active_for_network')) {
                require_once(ABSPATH . '/wp-admin/includes/plugin.php');
            }
            if (in_array('woocommerce-payments/woocommerce-payments.php', apply_filters('active_plugins', get_option('active_plugins'))) || is_plugin_active_for_network('woocommerce-payments/woocommerce-payments.php')
                || in_array('woocommerce-subscriptions/woocommerce-subscriptions.php', apply_filters('active_plugins', get_option('active_plugins'))) || is_plugin_active_for_network('woocommerce-subscriptions/woocommerce-subscriptions.php')) {
                $this->is_woo_paymant_installed = true;
            }
        }
    }
}