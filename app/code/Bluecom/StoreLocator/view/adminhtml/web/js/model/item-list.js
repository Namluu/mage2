define(
    ['jquery', 'ko', 'Bluecom_StoreLocator/js/model/item/delivery-info'],
    function ($, ko, deliveryInfo) {
        'use strict';
        var itemsData = window.subscriptionConfig.delivery_info;
        return {
            getItemsData: function(){
                var flatItemData =[];
                $.map(itemsData, function (item , key) {
                    var productCartData = [];
                    var code = Object.keys(item)[0];
                    $.each(item[code].product , function(key , productData){
                        //productCartData.push(deliveryItem(productData))
                    });
                    flatItemData.push({
                        info: deliveryInfo(item[code] , code),
                        items: productCartData,
                        address_id: key
                    });
                });
                return flatItemData;
            }
        };
    }
);
