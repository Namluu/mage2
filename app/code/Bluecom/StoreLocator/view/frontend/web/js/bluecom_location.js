function initAutocomplete()
{
    var listLocation = [];
    // init map
    var mapElement = document.getElementById('ul-list'),
        isEnable = Number(mapElement.getAttribute('data-enable')),
        mapZoom = Number(mapElement.getAttribute('data-mapzoom')),
        firstLoc = mapElement.children[0];
    var defaultLoc = new google.maps.LatLng(
        firstLoc.getAttribute('data-longitude'), 
        firstLoc.getAttribute('data-latitude')
        );

    var mapCanvas = document.getElementById('map');
    var mapOptions = {
        center: defaultLoc,
        zoom: mapZoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);

    // show location marker on map
    listLocation = showLocations(map);

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

            find_closest_marker(listLocation, place.geometry.location, map);

        });



    });
    // [END region_getplaces]
}

function showLocations(map)
{
    listLocation = [];

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

        listLocation.push(position);
    });

    return listLocation;

}

function rad(x) {return x*Math.PI/180;}
function find_closest_marker( list, current, map ) {
    var lat = current.lat();
    var lng = current.lng();
    var R = 6371; // radius of earth in km
    var distances = [];
    var closest = -1;
    for( i=0;i<list.length; i++ ) {
        var mlat = list[i].lat();
        var mlng = list[i].lng();
        var dLat  = rad(mlat - lat);
        var dLong = rad(mlng - lng);
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(rad(lat)) * Math.cos(rad(lat)) * Math.sin(dLong/2) * Math.sin(dLong/2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        var d = R * c;
        distances[i] = d;
        if ( closest == -1 || d < distances[closest] ) {
            closest = i;
        }
    }


    var directionsDisplay = new google.maps.DirectionsRenderer({
        map: map
    });

    // Set destination, origin and travel mode.
    var request = {
        destination: list[closest],
        origin: current,
        travelMode: google.maps.TravelMode.DRIVING
    };

    // Pass the directions request to the directions service.
    var directionsService = new google.maps.DirectionsService();
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            // Display the route on the map.
            directionsDisplay.setDirections(response);
        }
    });

}