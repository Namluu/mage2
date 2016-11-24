define(
    ['jquery', 'ko'],
    function ($, ko) {
        'use strict';
        var frequencyData = window.subscriptionConfig.frequency_options;
        var flatFrequencyArray = ko.observableArray([]) ;
        return {
            getFrequencies: function(){
                $.map(frequencyData , function (value , key) {
                    flatFrequencyArray.push(
                        {
                            id: key,
                            text: value
                        }
                    );
                });
                return flatFrequencyArray;
            }
        };
    }
);
