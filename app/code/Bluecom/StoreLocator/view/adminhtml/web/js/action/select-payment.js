/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*global define*/
define(
    [
        'jquery',
        'Bluecom_StoreLocator/js/model/profile',
        'Bluecom_StoreLocator/js/model/emulator-order',
    ],
    function ($, profile, orderData) {
        'use strict';
        return function (selectedValue) {
            if(!_.isUndefined(selectedValue)){
                var paymentCode = selectedValue.value;
                var price = parseFloat(selectedValue.params.price);
                var oldPaymentFee = parseFloat(orderData.getPaymentFee());
                var grandTotal = parseFloat(orderData.getGrandTotal());
                orderData.grand_total(grandTotal - oldPaymentFee + price);
                orderData.payment_fee(price);

                profile.paymentmethod(paymentCode);
            }
        };
    }
);