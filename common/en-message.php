<?php

/**
 * All App Name messages
 */

namespace EnDayrossMessage;

/**
 * Messages are relate to errors, warnings, headings
 * Class EnDayrossMessage
 * @package EnDayrossMessage
 */
if (!class_exists('EnDayrossMessage')) {

    class EnDayrossMessage
    {

        /**
         * Add all messages
         * EnDayrossMessage constructor.
         */
        public function __construct()
        {
            if (!defined('EN_DAYROSS_ROOT_URL'))
            {
                define('EN_DAYROSS_ROOT_URL', esc_url('https://eniture.com'));
            }
            define('EN_DAYROSS_STANDARD_PLAN_URL', EN_DAYROSS_ROOT_URL . '/plan/woocommerce-day-ross-ltl-freight/');
            define('EN_DAYROSS_ADVANCED_PLAN_URL', EN_DAYROSS_ROOT_URL . '/plan/woocommerce-day-ross-ltl-freight/');
            define('EN_DAYROSS_SUBSCRIBE_PLAN_URL', EN_DAYROSS_ROOT_URL . '/plan/woocommerce-day-ross-ltl-freight/');
            define('EN_DAYROSS_700', "You are currently on the Trial Plan. Your plan will be expire on ");
            define('EN_DAYROSS_701', "You are currently on the Basic Plan. The plan renews on ");
            define('EN_DAYROSS_702', "You are currently on the Standard Plan. The plan renews on ");
            define('EN_DAYROSS_703', "You are currently on the Advanced Plan. The plan renews on ");
            define('EN_DAYROSS_704', "Your currently plan subscription is inactive <a href='javascript:void(0)' data-action='en_dayross_get_current_plan' onclick='en_update_plan(this);'>Click here</a> to check the subscription status. If the subscription status remains 
                inactive. Please activate your plan subscription from <a target='_blank' href='" . EN_DAYROSS_SUBSCRIBE_PLAN_URL . "'>here</a>");
            define('EN_DAYROSS_705', "<a target='_blank' class='en_plan_notification' href='" . EN_DAYROSS_STANDARD_PLAN_URL . "'>
                        Standard Plan required
                    </a>");
            define('EN_DAYROSS_706', "<a target='_blank' class='en_plan_notification' href='" . EN_DAYROSS_ADVANCED_PLAN_URL . "'>
                        Advanced Plan required
                    </a>");
            define('EN_DAYROSS_707', "Please verify credentials at connection settings panel.");
            define('EN_DAYROSS_708', "Please enter valid US or Canada zip code.");
            define('EN_DAYROSS_709', "Success! The test resulted in a successful connection.");
            define('EN_DAYROSS_710', "Zip code already exists.");
            define('EN_DAYROSS_711', "Connection settings are missing.");
            define('EN_DAYROSS_712', "Shipping parameters are not correct.");
            define('EN_DAYROSS_713', "Origin address is missing.");
            define('EN_DAYROSS_714', ' <a href="javascript:void(0)" data-action="en_dayross_get_current_plan" onclick="en_update_plan(this);">Click here</a> to refresh the plan');
        }

    }

}