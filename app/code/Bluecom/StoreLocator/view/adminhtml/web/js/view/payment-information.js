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
        'Bluecom_StoreLocator/js/model/profile',
        'Bluecom_StoreLocator/js/model/payment-method',
        'Bluecom_StoreLocator/js/model/utils',
        'Bluecom_StoreLocator/js/action/select-payment',
        "mage/translate",
        "mage/mage",
        "mage/validation"
    ], function (
        $,
        ko,
        Component,
        alert,
        profile,
        paymentMethod,
        utils,
        selectPaymentAction,
        mage,
        $t
    ) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/payment-information',
            },
            /** Initialize observable properties */
            initObservable: function () {
                this.paymentMethod = paymentMethod.getAllowedPaymentMethod();
                this.paymentMethodSelected = profile.getSelectedPaymentMethod();
                this.isAllowChangePaymentMethod = paymentMethod.getIsAllowChangePaymentMethod();
                return this;
            },
            formatCurrency: function(value) {
                return utils.getFormattedPrice(value);
            },
            selectPaymentMethod: function(component , event) {
                selectPaymentAction(this);
                return true;
            }
        });
    }
);
