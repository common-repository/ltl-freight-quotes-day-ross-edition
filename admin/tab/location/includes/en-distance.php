<?php

namespace EnDayrossDistance;

use EnDayrossCurl\EnDayrossCurl;

if (!class_exists('EnDayrossDistance')) {

    class EnDayrossDistance
    {

        static public function get_address($map_address, $en_access_level, $en_destination_address = [])
        {
            $post_data = array(
                'acessLevel' => $en_access_level,
                'address' => $map_address,
                'originAddresses' => $map_address,
                'destinationAddress' => (isset($en_destination_address)) ? $en_destination_address : '',
                'eniureLicenceKey' => get_option('en_connection_settings_license_key_dayross'),
                'ServerName' => EN_DAYROSS_SERVER_NAME,
            );

            return EnDayrossCurl::en_dayross_sent_http_request(EN_DAYROSS_ADDRESS_HITTING_URL, $post_data, 'POST', 'Address');
        }

    }

}