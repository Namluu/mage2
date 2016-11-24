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
        'Bluecom_StoreLocator/js/model/frequency',
        'Bluecom_StoreLocator/js/action/select-frequency',
        "jquery/ui",
        "mage/translate",
        "mage/mage",
        "mage/validation"
    ], function (
        $,
        ko,
        Component,
        alert,
        profile,
        frequency,
        selectFrequencyAction,
        mage,
        $t
    ) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/basic-information',
            },
            /** Initialize observable properties */
            initObservable: function () {
                this._super();
                this.courseName = ko.observable(profile.getName());
                this.frequencyData = frequency.getFrequencies();
                this.selectedFrequency = profile.getSelectedFrequency();
                return this;
            },
            getStatus: function() {
                if (profile.getStatus() == 1) {
                    return $t("Active");
                } else {
                    return $t("Cancel");
                }
            },
            getFullFrequency: function() {
                return ko.computed(function() { 
                    return profile.frequency_interval() + ' ' + profile.frequency_unit(); 
                });
            },
            selectFrequency: function(component , event){
                var self = this;
                var selectedValue = _.find(self.frequencyData() , function(obj){
                    return obj.id == event.target.value;
                });
                return selectFrequencyAction(selectedValue.text);
            }
        });
    }
);
