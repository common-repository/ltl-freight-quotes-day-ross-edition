<?php

/**
 * Test connection details.
 */

namespace EnDayrossConnectionSettings;

/**
 * Add array for test connection.
 * Class EnDayrossConnectionSettings
 * @package EnDayrossConnectionSettings
 */
if (!class_exists('EnDayrossConnectionSettings')) {

    class EnDayrossConnectionSettings
    {

        static $get_connection_details = [];

        /**
         * Connection settings template.
         * @return array
         */
        static public function en_load()
        {
            echo '<div class="en_dayross_connection_settings">';

            $start_settings = [
                'en_connection_settings_start_dayross' => [
                    'name' => __('', 'woocommerce-settings-dayross'),
                    'type' => 'title',
                    'id' => 'en_connection_settings_dayross',
                ],
            ];

            // App Name Connection Settings Detail
            $eniture_settings = self::en_set_connection_settings_detail();

            $end_settings = [
                'en_connection_settings_end_dayross' => [
                    'type' => 'sectionend',
                    'id' => 'en_connection_settings_end_dayross'
                ]
            ];

            $settings = array_merge($start_settings, $eniture_settings, $end_settings);

            return $settings;
        }

        /**
         * Connection Settings Detail
         * @return array
         */
        static public function en_get_connection_settings_detail()
        {
            $connection_request = self::en_static_request_detail();
            $en_request_indexing = json_decode(EN_DAYROSS_SET_CONNECTION_SETTINGS, true);
            foreach ($en_request_indexing as $key => $value) {
                $saved_connection_detail = get_option($key);
                $connection_request[$value['eniture_action']] = $saved_connection_detail;
                strlen($saved_connection_detail) > 0 ?
                    self::$get_connection_details[$value['eniture_action']] = $saved_connection_detail : '';
            }

            $connection_request['dimWeightBaseAccount'] = (!empty($connection_request['dimWeightBaseAccount']) && 'dims' == $connection_request['dimWeightBaseAccount'])?'1':'0';

            add_filter('en_dayross_reason_quotes_not_returned', [__CLASS__, 'en_dayross_reason_quotes_not_returned'], 99, 1);

            return $connection_request;
        }

        /**
         * Saving reasons to show proper error message on the cart or checkout page
         * When quotes are not returning
         * @param array $reasons
         * @return array
         */
        static public function en_dayross_reason_quotes_not_returned($reasons)
        {
            return empty(self::$get_connection_details) ? array_merge($reasons, [EN_DAYROSS_711]) : $reasons;
        }

        /**
         * Static Detail Set
         * @return array
         */
        static public function en_static_request_detail()
        {
            return
                [
                    'serverName' => EN_DAYROSS_SERVER_NAME,
                    'platform' => 'WordPress',
                    'carrierType' => 'LTL',
                    'carrierName' => 'dayross',
                    'carrierMode' => 'pro',
                    'requestVersion' => '2.0',
                    'requestKey' => time(),
                ];
        }

        /**
         * Connection Settings Detail Set
         * @return array
         */
        static public function en_set_connection_settings_detail()
        {
            return
                [
                    'en_connection_settings_username_dayross' => [
                        'eniture_action' => 'emailAddress',
                        'name' => __('Email ', 'woocommerce-settings-dayross'),
                        'type' => 'text',
                        'desc' => __('', 'woocommerce-settings-dayross'),
                        'id' => 'en_connection_settings_username_dayross'
                    ],

                    'en_connection_settings_password_dayross' => [
                        'eniture_action' => 'password',
                        'name' => __('Password ', 'woocommerce-settings-dayross'),
                        'type' => 'text',
                        'desc' => __('', 'woocommerce-settings-dayross'),
                        'id' => 'en_connection_settings_password_dayross'
                    ],

                    'en_connection_settings_account_number_dayross' => [
                        'eniture_action' => 'billToAccountNumber',
                        'name' => __('Bill To Account Number ', 'woocommerce-settings-dayross'),
                        'type' => 'text',
                        'desc' => __('', 'woocommerce-settings-dayross'),
                        'id' => 'en_connection_settings_account_number_dayross'
                    ],

                    'en_connection_settings_license_key_dayross' => [
                        'eniture_action' => 'licenseKey',
                        'name' => __('Eniture API Key ', 'woocommerce-settings-dayross'),
                        'type' => 'text',
                        'desc' => __('Obtain a Eniture API Key from <a href="' . EN_DAYROSS_ROOT_URL_PRODUCTS . '" target="_blank" >eniture.com </a>', 'woocommerce-settings-dayross'),
                        'id' => 'en_connection_settings_license_key_dayross'
                    ],

                    'en_connection_settings_acc_based_on_dayross' => [
                        'eniture_action' => 'dimWeightBaseAccount',
                        'name' => __('My Day & Ross account: ', 'woocommerce-settings-dayross'),
                        'type' => 'radio',
                        'default' => 'nodims',
                        'options' => array(
                            'nodims' => __('doesn\'t require dimensions to get quotes', 'woocommerce-settings-dayross'),
                            'dims' => __('requires dimensions to get quotes', 'woocommerce-settings-dayross'),
                        ),
                        'id' => 'en_connection_settings_acc_based_on_dayross'
                    ],
                ];
        }

    }

}
