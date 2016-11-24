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
        'Bluecom_StoreLocator/js/model/item-list',
        "jquery/ui",
        "mage/translate",
        "mage/mage",
        "mage/validation"
    ], function (
        $,
        ko,
        Component,
        alert,
        itemList ,
        mage ,
        $t
    ) {
        "use strict";

        var customerAddressData = window.subscriptionConfig.addresses_data;

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/items-information',
            },
            /** Initialize observable properties */
            initObservable: function () {
                this._super();
                this.itemData = itemList.getItemsData();
                this.customerAddressData = customerAddressData;
                return this;
            },
            selectAddress: function (element , event) {
                console.log('selected');
            }
        });
    }
);
