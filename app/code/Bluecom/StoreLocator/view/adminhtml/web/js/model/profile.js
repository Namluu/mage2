define(
    ['ko'],
    function (ko) {
        'use strict';
        var profileData = window.subscriptionConfig.profileData;
        return {
            profileHasChanged: ko.observable(false),
            frequency_unit: ko.observable(profileData.frequency_unit),
            frequency_interval: ko.observable(profileData.frequency_interval),
            paymentmethod: ko.observable(profileData.selected_payment),
            getName: function(){
                return profileData.name;
            },
            getStatus: function(){
                return profileData.status;
            },
            getSelectedFrequency: function(){
                return profileData.selected_frequency;
            },
            getSelectedPaymentMethod: function(){
                return profileData.selected_payment;
            }
        };
    }
);
