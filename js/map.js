function initialiser() {
    var latlng = new google.maps.LatLng(3.9285471, 43.6917806);
    var options = {
        center: latlng,
        zoom: 19,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var carte = new google.maps.Map(document.getElementById("carte"), options);
}