function initAutocomplete()
{
    // init map
    var defaultLoc = new google.maps.LatLng(10.8034919, 106.6161219);

    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: defaultLoc,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);

    // show location marker on map
    showLocations(map);

    // Create the search box and link it to the UI element.
    var input = document.getElementById('addressInput');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var markers = [];
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                title: 'Your address',
                position: place.geometry.location
            }));

            map.setCenter(place.geometry.location);

        });
    });
    // [END region_getplaces]
}

function showLocations(map)
{
    var locs = document.getElementById('ul-list').children;
    Array.prototype.forEach.call(locs, function(el, i){
        var position = new google.maps.LatLng(
            el.getAttribute('data-longitude'), 
            el.getAttribute('data-latitude'));

        var marker = new google.maps.Marker({
            position: position,
            map: map,
            title: el.getAttribute('data-title')
        });

        var contentString = '<strong>' + el.getAttribute('data-title') + '</strong><br />' + 
            el.getAttribute('data-address') + '<br />' + 
            el.getAttribute('data-phone');

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });

        el.addEventListener('click', function() {
            var position = new google.maps.LatLng(
                el.getAttribute('data-longitude'), 
                el.getAttribute('data-latitude'));

            map.setCenter(position);
        });
    });
}

