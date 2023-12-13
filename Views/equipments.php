<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing</title>
    <link rel="stylesheet" href="../css/styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


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
        <?php
                echo "<div class='icons'>";
                echo "<i class='fas fa-shopping-cart'></i>"; // Shopping cart icon
                echo "<i class='fas fa-user'></i>"; // User (profile) icon
                echo "</div>";
                ?>
    </header>
    
</body>
</html>
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "ecommercedatabase";
    $login_failed = true;
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbName);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT * FROM clothing";
$result = $conn->query($sql);

echo "<h2>------Equipments------</h2>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='equipment-item'>";
        echo "<h3>" . $row['Name'] . "</h3>";
        echo "<button class='add-to-cart'>Add to Cart</button>";
        echo "</div>";
    }
} else {
    echo "No equipment items found.";
}

// Close the database connection
$conn->close();
?>