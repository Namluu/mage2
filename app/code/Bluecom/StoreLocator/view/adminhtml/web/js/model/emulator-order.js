define(
    ['jquery', 'ko'],
    function ($, ko) {
        'use strict';
        var orderData = window.subscriptionConfig.order_data;
        return {
            grand_total: ko.observable(orderData.grand_total),
            payment_fee: ko.observable(orderData.payment_fee),
            getGrandTotal: function(){
                return this.grand_total();
            },
            getPaymentFee: function(){
                return this.payment_fee();
            }
        };
    }
);
