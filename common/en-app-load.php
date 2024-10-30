<?php

/**
 * App Name load classes.
 */

namespace EnDayrossLoad;

use EnDayrossCsvExport\EnDayrossCsvExport;
use EnDayrossConfig\EnDayrossConfig;
use EnDayrossCreateLTLClass\EnDayrossCreateLTLClass;
use EnDayrossLocationAjax\EnDayrossLocationAjax;
use EnDayrossMessage\EnDayrossMessage;
use EnDayrossOrderRates\EnDayrossOrderRates;
use EnDayrossOrderScript\EnDayrossOrderScript;
use EnDayrossPlans\EnDayrossPlans;
use EnDayrossWarehouse\EnDayrossWarehouse;
use EnDayrossTestConnection\EnDayrossTestConnection;
use EnDayrossOrderWidget\EnDayrossOrderWidget;

/**
 * Load classes.
 * Class EnDayrossLoad
 * @package EnDayrossLoad
 */
if (!class_exists('EnDayrossLoad')) {

    class EnDayrossLoad
    {

        /**
         * Load classes of App Name plugin
         */
        static public function Load()
        {
            new EnDayrossMessage();
            new EnDayrossPlans();
            EnDayrossConfig::do_config();
            new \EnDayrossCarrierShippingRates();
            

            if (is_admin()) {
                new EnDayrossCreateLTLClass();
                new EnDayrossWarehouse();
                new EnDayrossTestConnection();
                new EnDayrossLocationAjax();
                new EnDayrossOrderRates();
                new \EnUpdateProductNestedOptions('hooks');
                !class_exists('EnOrderWidget') ? new EnDayrossOrderWidget() : '';
                !class_exists('EnCsvExport') ? new EnDayrossCsvExport() : '';
            }
        }

    }
}
