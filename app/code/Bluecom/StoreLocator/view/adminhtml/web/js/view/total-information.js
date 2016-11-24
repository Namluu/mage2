/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define([
        "jquery",
        'ko',
        'uiComponent',
        'Magento_Ui/js/modal/alert',
        'Bluecom_StoreLocator/js/model/utils',
        'Bluecom_StoreLocator/js/model/emulator-order',
        "mage/translate",
        "mage/mage",
        "mage/validation"
    ], function (
        $,
        ko,
        Component,
        alert,
        utils,
        order,
        mage,
        $t
    ) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/total-information',
            },
            /** Initialize observable properties */
            initObservable: function () {
                this._super();
                this.orderData = order;
                return this;
            },
            getPriceFormatted: function(price) {
                return utils.getFormattedPrice(price);
            }
        });
    }
);
