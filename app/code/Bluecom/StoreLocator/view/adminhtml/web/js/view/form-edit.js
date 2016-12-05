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
        'Magento_Ui/js/modal/modal',
        "jquery/ui",
        "mage/translate"
    ], function (
        $,
        ko,
        Component,
        alert,
        profile,
        modal,
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
            },
            addProductToCourse: function(formEdit , event){
                var hiddenElement = $('#add-products');
                var options = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: true,
                    modalClass: 'add-product-popup',
                    title: $t('Add product'),
                    buttons: [{
                        text: $t('Continue'),
                        click: function () {
                            this.closeModal();
                        }
                    }]
                };
                var popup = modal(options,hiddenElement );
                hiddenElement.modal('openModal');
            },
            updateAllChanges: function(){
                if (!this.validateForm('#form-submit-profile')) {
                   return;
                }
                console.log('validate success');
            },
            validateForm: function (form) {
                return $(form).validation() && $(form).validation('isValid');
            }
        });
    }
);
