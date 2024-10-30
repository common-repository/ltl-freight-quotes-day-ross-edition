<?php

/**
 * App Name details.
 */

namespace EnDayrossConfig;

use EnDayrossConnectionSettings\EnDayrossConnectionSettings;
use EnDayrossQuoteSettingsDetail\EnDayrossQuoteSettingsDetail;

/**
 * Config values.
 * Class EnDayrossConfig
 * @package EnDayrossConfig
 */
if (!class_exists('EnDayrossConfig')) {

    class EnDayrossConfig
    {

        /**
         * Save config settings
         */
        static public function do_config()
        {
            define('EN_DAYROSS_PLAN', get_option('en_dayross_plan_number'));
            !empty(get_option('en_dayross_plan_message')) ? define('EN_DAYROSS_PLAN_MESSAGE', get_option('en_dayross_plan_message')) : define('EN_DAYROSS_PLAN_MESSAGE', EN_DAYROSS_704);
            define('EN_DAYROSS_NAME', 'Day & Ross');
            define('EN_DAYROSS_PLUGIN_URL', plugins_url());
            define('EN_DAYROSS_ABSPATH', ABSPATH);
            define('EN_DAYROSS_DIR', plugins_url(EN_DAYROSS_MAIN_DIR));
            define('EN_DAYROSS_DIR_FILE', plugin_dir_url(EN_DAYROSS_MAIN_FILE));
            define('EN_DAYROSS_FILE', plugins_url(EN_DAYROSS_MAIN_FILE));
            define('EN_DAYROSS_BASE_NAME', plugin_basename(EN_DAYROSS_MAIN_FILE));
            define('EN_DAYROSS_SERVER_NAME', self::en_get_server_name());

            define('EN_DAYROSS_DECLARED_ZERO', 0);
            define('EN_DAYROSS_DECLARED_ONE', 1);
            define('EN_DAYROSS_DECLARED_ARRAY', []);
            define('EN_DAYROSS_DECLARED_FALSE', false);
            define('EN_DAYROSS_DECLARED_TRUE', true);
            define('EN_DAYROSS_SHIPPING_NAME', 'dayross');

            $weight_threshold = get_option('en_weight_threshold_lfq');
            $weight_threshold = isset($weight_threshold) && $weight_threshold > 0 ? $weight_threshold : 150;
            define('EN_DAYROSS_SHIPMENT_WEIGHT_EXCEEDS_PRICE', $weight_threshold);
            define('EN_DAYROSS_SHIPMENT_WEIGHT_EXCEEDS', get_option('en_plugins_return_LTL_quotes'));
            if (!defined('EN_DAYROSS_ROOT_URL'))
            {
                define('EN_DAYROSS_ROOT_URL', esc_url('https://eniture.com'));
            }
            define('EN_DAYROSS_ROOT_URL_PRODUCTS', EN_DAYROSS_ROOT_URL . '/products/');
            define('EN_DAYROSS_RAD_URL', EN_DAYROSS_ROOT_URL . '/woocommerce-residential-address-detection/');
            define('EN_DAYROSS_SUPPORT_URL', esc_url('https://support.eniture.com'));
            define('EN_DAYROSS_DOCUMENTATION_URL', EN_DAYROSS_ROOT_URL . '/woocommerce-day-ross-ltl-freight/');

            define('EN_DAYROSS_ROOT_URL_QUOTES', esc_url('https://ws079.eniture.com'));

            define('EN_DAYROSS_HITTING_API_URL', EN_DAYROSS_ROOT_URL_QUOTES . '/dayross/quotes.php');
            define('EN_DAYROSS_ADDRESS_HITTING_URL', EN_DAYROSS_ROOT_URL_QUOTES . '/addon/google-location.php');
            define('EN_DAYROSS_PLAN_HITTING_URL', EN_DAYROSS_ROOT_URL_QUOTES . '/web-hooks/subscription-plans/create-plugin-webhook.php?');
            define('EN_DAYROSS_ORDER_EXPORT_HITTING_URL', 'https://analytic-data.eniture.com/index.php');
            
            define('EN_DAYROSS_SET_CONNECTION_SETTINGS', wp_json_encode(EnDayrossConnectionSettings::en_set_connection_settings_detail()));
            define('EN_DAYROSS_GET_CONNECTION_SETTINGS', wp_json_encode(EnDayrossConnectionSettings::en_get_connection_settings_detail()));
            define('EN_DAYROSS_SET_QUOTE_SETTINGS', wp_json_encode(EnDayrossQuoteSettingsDetail::en_dayross_quote_settings()));
            define('EN_DAYROSS_GET_QUOTE_SETTINGS', wp_json_encode(EnDayrossQuoteSettingsDetail::en_dayross_get_quote_settings()));

            $en_app_set_quote_settings = json_decode(EN_DAYROSS_SET_QUOTE_SETTINGS, true);

            define('EN_DAYROSS_ALWAYS_ACCESSORIAL', wp_json_encode(EnDayrossQuoteSettingsDetail::en_dayross_always_accessorials($en_app_set_quote_settings)));
            define('EN_DAYROSS_ACCESSORIAL', wp_json_encode(EnDayrossQuoteSettingsDetail::en_dayross_compare_accessorial($en_app_set_quote_settings)));
        }

        /**
         * Get Host
         * @param type $url
         * @return type
         */
        static public function en_get_host($url)
        {
            $parse_url = parse_url(trim($url));
            if (isset($parse_url['host'])) {
                $host = $parse_url['host'];
            } else {
                $path = explode('/', $parse_url['path']);
                $host = $path[0];
            }
            return trim($host);
        }

        /**
         * Get Domain Name
         */
        static public function en_get_server_name()
        {
            global $wp;
            $wp_request = (isset($wp->request)) ? $wp->request : '';
            $url = home_url($wp_request);
            return self::en_get_host($url);
        }

    }

}
