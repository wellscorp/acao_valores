
var map;
var markers = [];
top.lat= "";

function initialize() {

    haightAshbury = new google.maps.LatLng(-12.974282086640057 ,-38.503957986831665);
    myLatlng = new google.maps.LatLng(-12.980805882956505,-38.49691987037659);
    var mapOptions = {
        zoom: 13,
        center: haightAshbury,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("googleMap"),
        mapOptions);

    // This event listener will call addMarker() when the map is clicked.

    google.maps.event.addListener(map, 'click', function(event) {

    });



    // Adds a marker at the center of the map.
    addMarker(haightAshbury);
}

// Add a marker to the map and push to the array.
function addMarker(location) {
    //clearMarkers();
    //markers = [];
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markers.push(marker);
    var lat= location.lat();
    var lng= location.lng();
    console.log(lat);
    console.log(lng);
    $("#posicao").empty();
    $("#posicao").append(
        '<input type="hidden" name="latitude" value="'+lat+'"> <input type="hidden" name="longitude" value="'+lng+'">'
    );

}

// Sets the map on all markers in the array.
function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setAllMap(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
    console.log(markers);
}

google.maps.event.addDomListener(window, 'load', initialize);