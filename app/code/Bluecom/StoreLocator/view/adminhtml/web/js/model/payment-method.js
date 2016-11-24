define(
    ['jquery', 'ko'],
    function ($, ko) {
        'use strict';
        var paymentMethodList = window.subscriptionConfig.payment_method;
        return {
            getAllowedPaymentMethod: function(){
                return paymentMethodList;
            },
            getSelectedPaymentMethod: function(){
                return profile.getSelectedPaymentMethod();
            },
            getIsAllowChangePaymentMethod: function(){
                return true;
            }
        };
    }
);
