<?php
include_once "../dbCon.php";

$sql = "SELECT * FROM clothing";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing</title>
    <link rel="stylesheet" href="../css/styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />
    <style>
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
        </nav>
        <div class="icons">
                <i class="fas fa-shopping-cart"></i> <!-- Shopping cart icon -->

                <div class="user-dropdown">
                    <i class="fas fa-user"></i> <!-- User icon -->
                    <span><?= isset($username) ? $username : 'Guest'; ?></span>
                    <ul class="user-dropdown-menu">
                        <li class="submenu">
                            <a href="../../index.php">Log in</a>
                        </li>
                        <li class="submenu">
                            <a href="#">Details</a>
                        </li>
                    </ul>
                </div>
            </div>
    </header>
    
</body>
</html>
<?php
echo "<h2>------Clothing------</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='clothing-item'>";
        echo "<h3>" . $row['Name'] . "</h3>";
        echo "<button class='add-to-cart'>Add to Cart</button>";
        echo "</div>";
    }
} else {
    echo "No clothing items found.";
}

// Close the database connection
$conn->close();
?>