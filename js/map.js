var map;
var myLatLng = {lat: 43.6917806, lng: 3.9285471};

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 17
    });

    var marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });
}