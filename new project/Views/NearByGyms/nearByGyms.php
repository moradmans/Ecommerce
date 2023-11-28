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
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>

<header>
        <nav>
            <ul class="nav-menu">
                <li><a href="index.php?controller=main">Home</a></li>
                <li class="dropdown">
                    <a href="">Products</a>
                    <ul class="dropdown-menu">
                        <li class="submenu">
                            <a href="index.php?controller=clothing">Clothing</a>
                        </li>
                        <li class="submenu">
                            <a href="../equipments.php">Equipment</a>
                        </li>
                        <li class="submenu">
                            <a href="../supplements.php">Supplements</a>
                        </li>
                    </ul>
                </li>
                <li><a href="../services.php">Services</a></li>
                <li><a href="index.php?controller=nearByGyms">Nearby Gym</a></li>
                <li><a href="index.php?controller=contact">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
    <i class="fas fa-shopping-cart"></i> <!-- Shopping cart icon -->

    <div class="user-dropdown">
    <i class="fas fa-user"></i> <!-- User icon -->
    <span><?= isset($username) ? $username : 'Guest'; ?></span>
    <ul class="user-dropdown-menu">
        <li class="submenu">
            <?php if (isset($username)) : ?>
                <a href="index.php?controller=login&action=logout">Log out</a>
            <?php else : ?>
                <a href="index.php?controller=login">Login</a>
            <?php endif; ?>
        </li>
        <li class="submenu">
            <a href="index.php?controller=details">Details</a>
        </li>
    </ul>
</div>
    </header>

    <div id="map"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCepA0MZGpUmihllM7FOFJ1ocRUK7xelWU&callback=initMap"></script>
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

                        // Fetch gym data from the database
                        $.ajax({
                            url: 'getGyms.php', // Replace with the actual path to your PHP script
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                // Loop through the gym data and add markers
                                data.forEach(function(gym) {
                                    var gymLocation = {
                                        lat: parseFloat(gym.lat),
                                        lng: parseFloat(gym.lng)
                                    };

                                    addMarker(gymLocation, gym.name, map);
                                });
                            },
                            error: function(error) {
                                console.error('Error fetching gym data: ', error);
                            }
                        });

                        // Function to add a marker
                        function addMarker(location, name, map) {
                            var marker = new google.maps.Marker({
                                position: location,
                                map: map,
                                title: name // You can customize the title of the marker with the gym name
                            });

                            // You can add an info window with additional information if needed
                            var infoWindow = new google.maps.InfoWindow({
                                content: '<h3>' + name + '</h3>'
                            });

                            marker.addListener('click', function() {
                                infoWindow.open(map, marker);
                            });
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



    <?php if ($isAdminOrStaff) : ?>
        <div id="gymForm">
            <h2>Add a New Gym</h2>
            <form action="index.php?controller=nearByGyms&action=add" method="post" onsubmit="addGym(event)">
                <label for="gymName">Name of the Gym:</label>
                <input type="text" id="gymName" name="gymName" required>
                <label for="gymAddress">Gym Address:</label>
                <input type="text" id="gymAddress" name="gymAddress" required>
                <button type="submit" name="addGym">Add Gym</button>
            </form>
        </div>
    <?php endif; ?>

    <script src="/app.js"></script>
</body>
</html>
