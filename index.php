<!DOCTYPE html>
<html>
<head>
    <title>Distance Measurement on Map</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Distance Measurement on Map</h1>
    <label for="from">From:</label>
    <input type="text" id="from">
    <label for="to">To:</label>
    <input type="text" id="to">
    <button onclick="calculateDistance()">Measure Distance</button>
    <div id="map"></div>
    <div id="distance"></div>

    <script>
        var map;
        var directionsService;
        var directionsDisplay;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom: 8
            });
            directionsService = new google.maps.DirectionsService();
            directionsDisplay = new google.maps.DirectionsRenderer();
            directionsDisplay.setMap(map);
        }

        function calculateDistance() {
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;

            var request = {
                origin: from,
                destination: to,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(response, status) {
                if (status == 'OK') {
                    directionsDisplay.setDirections(response);
                    var distance = response.routes[0].legs[0].distance.text;
                    document.getElementById('distance').innerHTML = 'Distance: ' + distance;
                } else {
                    window.alert('Error: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
<div style="font:small;"><a href="https://distancetocity.com/">© distancetocity.com</a></div>
</body>
</html>
