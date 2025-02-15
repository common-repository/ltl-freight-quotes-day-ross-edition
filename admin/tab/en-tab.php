<?php
/**
 * App Name tabs.
 */

use EnDayrossConnectionSettings\EnDayrossConnectionSettings;

if (!class_exists('EnDayrossTab')) {
    /**
     * Tabs show on admin side.
     * Class EnDayrossTab
     */
    class EnDayrossTab extends WC_Settings_Page
    {
        /**
         * Hook for call.
         */
        public function en_load()
        {
            $this->id = 'dayross';
            add_filter('woocommerce_settings_tabs_array', [$this, 'add_settings_tab'], 50);
            add_action('woocommerce_sections_' . $this->id, [$this, 'output_sections']);
            add_action('woocommerce_settings_' . $this->id, [$this, 'output']);
            add_action('woocommerce_settings_save_' . $this->id, [$this, 'save']);
        }

        /**
         * Setting Tab For Woocommerce
         * @param $settings_tabs
         * @return string
         */
        public function add_settings_tab($settings_tabs)
        {
            $settings_tabs[$this->id] = __('Day & Ross', 'woocommerce-settings-dayross');
            return $settings_tabs;
        }

        /**
         * Setting Sections
         * @return array
         */
        public function get_sections()
        {
            $sections = array(
                '' => __('Connection Settings', 'woocommerce-settings-dayross'),
                'section-2' => __('Quote Settings', 'woocommerce-settings-dayross'),
                'section-3' => __('Warehouses', 'woocommerce-settings-dayross'),
                // fdo va
                'section-4' => __('FreightDesk Online', 'woocommerce-settings-dayross'),
                'section-5' => __('Validate Addresses', 'woocommerce-settings-dayross'),
                'section-6' => __('User Guide', 'woocommerce-settings-dayross'),
            );

            // Logs data
            $enable_logs = get_option('en_quote_settings_enable_logs');
            if ($enable_logs == 'yes') {
                $sections['en-logs'] = 'Logs';
            }

            $sections = apply_filters('en_dayross_add_sections', $sections);
            $sections = apply_filters('en_woo_addons_sections', $sections, EN_DAYROSS_SHIPPING_NAME);
            // Standard Packaging
            $sections = apply_filters('en_woo_pallet_addons_sections', $sections, EN_DAYROSS_SHIPPING_NAME);
            return apply_filters('woocommerce_get_sections_' . $this->id, $sections);
        }


        /**
         * Display all pages on wc settings tabs
         * @param $section
         * @return array
         */
        public function get_settings($section = null)
        {
            ob_start();
            switch ($section) {
                case 'section-2' :
                    $settings = \EnDayrossQuoteSettings\EnDayrossQuoteSettings::Load();
                    break;

                case 'section-3':
                    EnLocation::en_load();
                    $settings = [];
                    break;
                // fdo va
                case 'section-4' :
                    \EnDayrossFreightdeskonline\EnDayrossFreightdeskonline::en_load();
                    $settings = [];
                    break;

                case 'section-5' :
                    \EnDayrossValidateaddress\EnDayrossValidateaddress::en_load();
                    $settings = [];
                    break;
                case 'section-6' :
                    \EnDayrossUserGuide\EnDayrossUserGuide::en_load();
                    $settings = [];
                    break;
                
                case 'en-logs' :
                    require_once 'logs/en-logs.php';
                    $settings = [];
                    break;       

                default:
                    $settings = EnDayrossConnectionSettings::en_load();
                    break;
            }

            $settings = apply_filters('en_dayross_add_settings', $settings, $section);
            $settings = apply_filters('en_woo_addons_settings', $settings, $section, EN_DAYROSS_SHIPPING_NAME);
            $settings = apply_filters('en_woo_pallet_addons_settings', $settings, $section, EN_DAYROSS_SHIPPING_NAME);
            // Standard Packaging
            $settings = apply_filters('en_woo_pallet_addons_settings', $settings, $section, EN_DAYROSS_SHIPPING_NAME);
            $settings = $this->avaibility_addon($settings);
            return apply_filters('woocommerce-settings-dayross', $settings, $section);
        }

        /**
         * RAD addon activated or not
         * @param array type $settings
         * @return array type
         */
        function avaibility_addon($settings)
        {
            if (!function_exists('is_plugin_active')) {
                require_once(EN_DAYROSS_ABSPATH . '/wp-admin/includes/plugin.php');
            }

            if (is_plugin_active('residential-address-detection/residential-address-detection.php')) {
                unset($settings['avaibility_lift_gate']);
                unset($settings['avaibility_auto_residential']);
            }

            return $settings;
        }

        /**
         * WooCommerce Settings Tabs
         * @global $current_section
         */
        public function output()
        {
            global $current_section;
            $settings = $this->get_settings($current_section);
            WC_Admin_Settings::output_fields($settings);
        }

        /**
         * Woocommerce Save Settings
         * @global $current_section
         */
        public function save()
        {
            global $current_section;
            $settings = $this->get_settings($current_section);
            WC_Admin_Settings::save_fields($settings);
        }
    }

    $en_tab = new EnDayrossTab();
    return $en_tab->en_load();
}
