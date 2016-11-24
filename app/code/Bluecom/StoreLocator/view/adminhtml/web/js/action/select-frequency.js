/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*global define*/
define(
    [
        'jquery',
        'Bluecom_StoreLocator/js/model/profile'
    ],
    function ($, profile) {
        'use strict';
        return function (selectedValue) {
            var interval = selectedValue.substr(0,selectedValue.indexOf(' '));
            var unit = selectedValue.substr(selectedValue.indexOf(' ') + 1);
            profile.frequency_unit(unit);
            profile.frequency_interval(interval);
        };
    }
);