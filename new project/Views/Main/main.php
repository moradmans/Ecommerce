<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Gym</title>
    <link rel="stylesheet" href="../css/styles.css"> 
    <style>
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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />

</head>
<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a href="homepage.php">Home</a></li>
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
                <li><a href="#">Nearby Gym</a></li>
                <li><a href="#">Contact</a></li>
            </ul>

            <div class="icons">
                <i class="fas fa-shopping-cart"></i> <!-- Shopping cart icon -->

                <div class="user-dropdown">
                    <i class="fas fa-user"></i> <!-- User icon -->
                    <ul class="user-dropdown-menu">
                        <li class="submenu">
                            <a href="#">Logout</a>
                        </li>
                        <li class="submenu">
                            <a href="#">Details</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="hero">
        <h1>Welcome to My Gym</h1>
        <p>Your path to a healthier you starts here.</p>
    </section>
    <section class="content">
    </section>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
