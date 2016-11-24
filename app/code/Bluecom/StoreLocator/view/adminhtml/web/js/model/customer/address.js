define(
    [],
    function () {
        'use strict';
        // re-format address object data
        return function(addressData) {
            return {
                 customerAddressId: addressData.id,
                 email: addressData.email,
                 customerId: addressData.customer_id,
                 inline_address: addressData.inline_address
            }
        }
    }
);
