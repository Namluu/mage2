/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define([], function() {
    /**
     * @param addressData
     * Returns new address object
     */
    return function (deliveryInfo , code ) {
        return {
            code: code,
            //next_delivery_date: deliveryInfo.delivery_date.next_delivery_date,
            //timeslot_id: deliveryInfo.delivery_date.time_slot,
            name: deliveryInfo.name,
            //address: deliveryInfo.info
        }
    }
});