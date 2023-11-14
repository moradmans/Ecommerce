<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Api</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        #map {
            height: 400px; /* Adjust the height as needed */
            width: 100%;
        }

        /* Add any additional styles you need for your specific design */
    </style>
</head>

<body>
    <h1>Google Maps</h1>

    <div id="map"></div>

    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCepA0MZGpUmihllM7FOFJ1ocRUK7xelWU&callback=initMap">
    </script>
    <script>
        function initMap() {
            // Try HTML5 geolocation
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        var userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        // Map option
                        var options = {
                            center: userLocation,
                            zoom: 10
                        };

                        // New Map
                        var map = new google.maps.Map(document.getElementById("map"), options);

                        // Marker
                        let MarkerArray = [
                            {location:{lat: 45.497570, lng: -73.706110}, content: `<h2>Golds Gym</h2>`},
                            {location:{lat: 45.517200, lng: -73.644560},content: `<h2>Studio 1 Gym</h2>`},
                            {location:{lat: 45.532320, lng: -73.655210}, content: `<h2>Worlds Gym</h2>`}
                        ];

                        // Loop through markers
                        for (let i = 0; i < MarkerArray.length; i++) {
                            addMarker(MarkerArray[i]);
                        }

                        // Add Marker
                        function addMarker(property) {
                            const marker = new google.maps.Marker({
                                position: property.location,
                                map: map
                                // icon: property.imageIcon
                            });

                            if (property.content) {
                                const detailWindow = new google.maps.InfoWindow({
                                    content: property.content
                                });

                                marker.addListener("mouseover", () => {
                                    detailWindow.open(map, marker);
                                });
                            }
                        }
                    },
                    () => {
                        handleLocationError(true);
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false);
            }

            function handleLocationError(browserHasGeolocation) {
                var errorMessage = browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.';
                console.error(errorMessage);
            }
        }
    </script>
    <script src="/app.js"></script>
</body>
</html>
