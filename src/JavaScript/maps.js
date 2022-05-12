function initMap() {
    var input = document.getElementById('clientAddress');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('location-snap').
        innerHTML = place.formatted_address;
        document.getElementById('lat-span').
        innerHTML = place.geometry.location.lat();
        document.getElementById('lon-span').
        innerHTML = place.geometry.location.lng();
    });
}