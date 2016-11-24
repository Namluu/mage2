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
        mage,
        $t
    ) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Bluecom_StoreLocator/form-edit',
            },
            /** Initialize observable properties */
            initObservable: function () {
                var self = this;
                this._super();
                this.profileHasChange = profile.profileHasChanged;

                /* listent to profile change event */
                profile.profileHasChanged.subscribe(function(newValue){
                    self.profileHasChange(newValue);
                });

                return this;
            },
            generateNextOrder: function(formEdit , event){
               profile.profileHasChanged(true);
            }
        });
    }
);
