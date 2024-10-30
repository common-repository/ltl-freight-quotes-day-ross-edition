<?php

/**
 * App Name settings.
 */

namespace EnDayrossQuoteSettingsDetail;

/**
 * Get and save settings.
 * Class EnDayrossQuoteSettingsDetail
 * @package EnDayrossQuoteSettingsDetail
 */
if (!class_exists('EnDayrossQuoteSettingsDetail')) {

    class EnDayrossQuoteSettingsDetail
    {

        static public $en_dayross_accessorial = [];

        /**
         * Set quote settings detail
         */
        static public function en_dayross_get_quote_settings()
        {
            $accessorials = [];
            $en_settings = json_decode(EN_DAYROSS_SET_QUOTE_SETTINGS, true);
            $en_settings['liftgate_delivery_option'] == 'yes' ? $accessorials['liftGateAsAnOption'] = '1' : "";
            $en_settings['liftgate_delivery'] == 'yes' ? $accessorials['accessorials']['TLGDEL'] = 'Tailgate Delivery' : "";
            $en_settings['residential_delivery'] == 'yes' ? $accessorials['accessorials']['PRESDL'] = 'Private Residence Delivery' : "";
            $accessorials['handlingUnitWeight'] = $en_settings['handling_unit_weight'];
            $accessorials['maxWeightPerHandlingUnit'] = $en_settings['max_handling_unit_weight'];

            return $accessorials;
        }

        /**
         * Set quote settings detail
         */
        static public function en_dayross_always_accessorials()
        {
            $accessorials = [];
            $en_settings = self::en_dayross_quote_settings();
            $en_settings['liftgate_delivery'] == 'yes' ? $accessorials[] = 'L' : "";
            $en_settings['residential_delivery'] == 'yes' ? $accessorials[] = 'R' : "";

            return $accessorials;
        }

        /**
         * Set quote settings detail
         */
        static public function en_dayross_quote_settings()
        {
            $enable_carriers = [];
            $rating_method = 'Cheapest';
            $quote_settings_label = get_option('en_quote_settings_custom_label_dayross');

            // Overlength Fees
            $range_1 = get_option('en_quote_settings_overlength_range_1_dayross');
            $range_1 = isset($range_1) && strlen($range_1) > 0 ? $range_1 : 85;
            $range_2 = get_option('en_quote_settings_overlength_range_2_dayross');
            $range_2 = isset($range_2) && strlen($range_2) > 0 ? $range_2 : 150;
            $range_3 = get_option('en_quote_settings_overlength_range_3_dayross');
            $range_3 = isset($range_3) && strlen($range_3) > 0 ? $range_3 : 250;
            $range_4 = get_option('en_quote_settings_overlength_range_4_dayross');
            $range_4 = isset($range_4) && strlen($range_4) > 0 ? $range_4 : 285;
            $range_5 = get_option('en_quote_settings_overlength_range_5_dayross');
            $range_5 = isset($range_5) && strlen($range_5) > 0 ? $range_5 : 770;

            $quote_settings = [
                'transit_days' => get_option('en_quote_settings_show_delivery_estimate_dayross'),
                'own_freight' => get_option('en_quote_settings_own_arrangment_dayross'),
                'own_freight_label' => get_option('en_quote_settings_text_for_own_arrangment_dayross'),
                'total_carriers' => get_option('en_quote_settings_number_of_options_dayross'),
                'rating_method' => (strlen($rating_method)) > 0 ? $rating_method : "Cheapest",
                'en_settings_label' => ($rating_method == "average_rate" || $rating_method == "Cheapest") ? $quote_settings_label : "",
                'handling_unit_weight' => get_option('en_quote_settings_handling_unit_weight_dayross'),
                'max_handling_unit_weight' => get_option('en_quote_settings_max_handling_unit_weight_dayross'),
                'handling_fee' => get_option('en_quote_settings_handling_fee_dayross'),
                'enable_carriers' => $enable_carriers,
                'liftgate_delivery' => get_option('en_quote_settings_liftgate_delivery_dayross'),
                'liftgate_delivery_option' => get_option('dayross_liftgate_delivery_as_option'),
                'residential_delivery' => get_option('en_quote_settings_residential_delivery_dayross'),
                'liftgate_resid_delivery' => get_option('en_woo_addons_liftgate_with_auto_residential'),
                'custom_error_message' => get_option('en_quote_settings_checkout_error_message_dayross'),
                'custom_error_enabled' => get_option('en_quote_settings_option_select_when_unable_retrieve_shipping_dayross'),
                'overlength_fees' => [
                    $range_1 => ['from' => 96, 'to' => 143],
                    $range_2 => ['from' => 144, 'to' => 191],
                    $range_3 => ['from' => 192, 'to' => 239],
                    $range_4 => ['from' => 240, 'to' => 287],
                    $range_5 => ['from' => 288, 'to' => 10000000000],
                ],
                'handling_weight' => get_option('en_quote_settings_handling_unit_weight_dayross'),
                'maximum_handling_weight' => get_option('en_quote_settings_max_handling_unit_weight_dayross'),
            ];

            return $quote_settings;
        }

        /**
         * Get quote settings detail
         * @param array $en_settings
         * @return array
         */
        static public function en_dayross_compare_accessorial($en_settings)
        {
            self::$en_dayross_accessorial[] = ['S'];
            $en_settings['liftgate_delivery_option'] == 'yes' ? self::$en_dayross_accessorial[] = ['L'] : "";

            return self::$en_dayross_accessorial;
        }

    }

}