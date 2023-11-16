<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Api</title>

    <style>
        h1 {
            text-align: center;
        }

        #map {
            height: 60vh; /* Set the desired height, adjust as needed */
    margin: 2rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 0.5rem;
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .submenu {
            margin: 0.3rem 0;
        }

        .hero {
            background-color: #f0f0f0;
            padding: 2rem;
            text-align: center;
        }

        .hero h1 {
            color: #333;
        }

        .content {
            padding: 2rem;
        }

        .icons {
            display: flex;
            gap: 1rem;
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 0.5rem;
            border-radius: 5px;
            z-index: 1;
        }

        .user-dropdown:hover .user-dropdown-menu {
            display: block;
        }

        /* Add any additional styles you need for your specific design */
    </style>
</head>

<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php?controller=main">Home</a></li>
                <li class="dropdown">
                    <a href="#">Products</a>
                    <ul class="dropdown-menu">
                        <li class="submenu">
                            <a href="clothing.php">Clothing</a>
                        </li>
                        <li class="submenu">
                            <a href="equipments.php">Equipment</a>
                        </li>
                        <li class="submenu">
                            <a href="supplements.php">Supplements</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Services</a></li>
                <li><a href="index.php?controller=nearByGyms">Nearby Gym</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <div class="icons">
                <i class="fas fa-shopping-cart"></i> <!-- Shopping cart icon -->

                <div class="user-dropdown">
                    <i class="fas fa-user"></i> <!-- User icon -->
                    <span><?= isset($username) ? $username : 'Guest'; ?></span>
                    <ul class="user-dropdown-menu">
                        <li class="submenu">
                            <a href="#">Logout</a>
                        </li>
                        <li class="submenu">
                            <a href="#">Settings</a> <!-- Add a link to user settings -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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
