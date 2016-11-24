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
        'Bluecom_StoreLocator/js/model/customer/address',
        "jquery/ui",
        "mage/translate",
        "mage/mage",
        "mage/validation"
    ], function (
        $,
        ko,
        Component,
        alert,
        address,
        mage,
        $t
    ) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/billing-information',
            },
            /** Initialize observable properties */
            initObservable: function() {
                this._super();
                this.billingAddressData = this.getBillingAddressData();
                return this;
            },
            getHasBillingInformation: function() {
                return ko.observable(window.subscriptionConfig.has_billing_address);
            },
            getBillingAddressData: function() {
                if(this.getHasBillingInformation()){
                    return address(window.subscriptionConfig.billing_information);
                } else {
                    return {};
                }
            }
        });
    }
);
