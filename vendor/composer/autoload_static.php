<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class EnDayrossComposerStaticInit1ed1fea8bfd107ca92e94cf1a2b758d4
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EnDayrossCarrierShippingRates' => __DIR__ . '/../..' . '/server/en-shipping-rates.php',
        'EnDayrossConfig\\EnDayrossConfig' => __DIR__ . '/../..' . '/common/en-config.php',
        'EnDayrossConnectionSettings\\EnDayrossConnectionSettings' => __DIR__ . '/../..' . '/admin/tab/connection-settings/en-connection-settings.php',
        'EnDayrossCreateLTLClass\\EnDayrossCreateLTLClass' => __DIR__ . '/../..' . '/server/common/en-create-ltl-class.php',
        'EnDayrossCsvExport\\EnDayrossCsvExport' => __DIR__ . '/../..' . '/common/en-csv.php',
        'EnDayrossCurl\\EnDayrossCurl' => __DIR__ . '/../..' . '/http/en-curl.php',
        'EnDayrossDistance\\EnDayrossDistance' => __DIR__ . '/../..' . '/admin/tab/location/includes/en-distance.php',
        'EnDayrossDropshipTemplate\\EnDayrossDropshipTemplate' => __DIR__ . '/../..' . '/admin/tab/location/dropship/en-dropship.php',
        'EnDayrossFdo\\EnDayrossFdo' => __DIR__ . '/../..' . '/fdo/en-fdo.php',
        'EnDayrossFilterQuotes\\EnDayrossFilterQuotes' => __DIR__ . '/../..' . '/server/common/en-filter-quotes.php',
        'EnDayrossFreightdeskonline\\EnDayrossFreightdeskonline' => __DIR__ . '/../..' . '/admin/tab/freightdesk-online/en-freightdesk-online.php',
        'EnDayrossGuard\\EnDayrossGuard' => __DIR__ . '/../..' . '/common/en-guard.php',
        'EnDayrossLoad\\EnDayrossLoad' => __DIR__ . '/../..' . '/common/en-app-load.php',
        'EnDayrossLocationAjax\\EnDayrossLocationAjax' => __DIR__ . '/../..' . '/admin/tab/location/includes/en-location-ajax.php',
        'EnDayrossMessage\\EnDayrossMessage' => __DIR__ . '/../..' . '/common/en-message.php',
        'EnDayrossOrderRates\\EnDayrossOrderRates' => __DIR__ . '/../..' . '/admin/order/en-order-rates.php',
        'EnDayrossOrderScript\\EnDayrossOrderScript' => __DIR__ . '/../..' . '/admin/order/en-order-script.php',
        'EnDayrossOrderWidget\\EnDayrossOrderWidget' => __DIR__ . '/../..' . '/admin/order/en-order-widget.php',
        'EnDayrossOtherRates\\EnDayrossOtherRates' => __DIR__ . '/../..' . '/server/api/en-other-rates.php',
        'EnDayrossPackage\\EnDayrossPackage' => __DIR__ . '/../..' . '/server/package/en-package.php',
        'EnDayrossPlans\\EnDayrossPlans' => __DIR__ . '/../..' . '/common/en-plans.php',
        'EnDayrossProductDetail\\EnDayrossProductDetail' => __DIR__ . '/../..' . '/admin/product/en-product-detail.php',
        'EnDayrossQuoteSettingsDetail\\EnDayrossQuoteSettingsDetail' => __DIR__ . '/../..' . '/server/common/en-quote-settings.php',
        'EnDayrossQuoteSettings\\EnDayrossQuoteSettings' => __DIR__ . '/../..' . '/admin/tab/quote-settings/en-quote-settings.php',
        'EnDayrossReceiverAddress\\EnDayrossReceiverAddress' => __DIR__ . '/../..' . '/server/common/en-receiver-address.php',
        'EnDayrossResponse\\EnDayrossResponse' => __DIR__ . '/../..' . '/server/api/en-response.php',
        'EnDayrossSPQ\\EnDayrossSPQ' => __DIR__ . '/../..' . '/server/spq/en-spq.php',
        'EnDayrossShippingRates' => __DIR__ . '/../..' . '/server/en-shipping-rates.php',
        'EnDayrossTab' => __DIR__ . '/../..' . '/admin/tab/en-tab.php',
        'EnDayrossTestConnection\\EnDayrossTestConnection' => __DIR__ . '/../..' . '/admin/tab/connection-settings/en-connection-ajax.php',
        'EnDayrossUserGuide\\EnDayrossUserGuide' => __DIR__ . '/../..' . '/admin/tab/user-guide/en-user-guide.php',
        'EnDayrossValidateaddress\\EnDayrossValidateaddress' => __DIR__ . '/../..' . '/admin/tab/validate-addresses/en-validate-addresses.php',
        'EnDayrossVersionCompact\\EnDayrossVersionCompact' => __DIR__ . '/../..' . '/server/common/en-version-compact.php',
        'EnDayrossWarehouseTemplate\\EnDayrossWarehouseTemplate' => __DIR__ . '/../..' . '/admin/tab/location/warehouse/en-warehouse.php',
        'EnDayrossWarehouse\\EnDayrossWarehouse' => __DIR__ . '/../..' . '/db/en-warehouse.php',
        'EnLocation' => __DIR__ . '/../..' . '/admin/tab/location/en-location.php',
        'EnUpdateProductNestedOptions' => __DIR__ . '/../..' . '/admin/product/en-nesting-product-detail.php',
        'EnDayrossOrderExport\\EnDayrossOrderExport' => __DIR__ . '/../..' . '/server/common/en-order-export.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = EnDayrossComposerStaticInit1ed1fea8bfd107ca92e94cf1a2b758d4::$classMap;

        }, null, ClassLoader::class);
    }
}
