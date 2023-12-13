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
    <link rel="stylesheet" href="../../css/styles.css"> 
    <style>
        body {
            background-color: #f0f0f0;
            background-image: url('images/images.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
            color: #FFFFFF;
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
            height: 80vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Add a semi-transparent overlay to improve text readability */
        .hero::before {
            content: "";
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5); /* Adjust the alpha value to control transparency */
            z-index: -1; /* Place the overlay behind the content */
        }

        .content {
            padding: 2rem;
        }

        .icons {
            display: flex;
            gap: 1rem;
            margin-left: auto; /* Move icons to the right */
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
            margin-left: auto; /* Move user dropdown to the right */
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            list-style: none;
            padding: 1rem; /* Increase the padding to make the dropdown menu a bit bigger */
            border-radius: 5px;
            z-index: 1;
            right: 0; /* Align user dropdown menu to the right */
        }

        .user-dropdown:hover .user-dropdown-menu {
            display: block;
        }



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
                <?php if ($isAdmin) : ?>
                    <li><a href="index.php?controller=information&action=getUsers">Information</a></li>
                 <?php endif; ?>
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
    <section class="hero">
        <h1>Welcome to My Gym</h1>
        <p>Your path to a healthier you starts here.</p>
    </section>
    <section class="content">
        <!-- ... your existing content ... -->
    </section>

    <!-- Font Awesome Icons -->
</body>
</html>