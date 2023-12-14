<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <style>
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

        /* Clothing page specific styles */
        .product-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-item {
            background-color: #fff;
            margin: 10px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 260px; /* Adjust the width as needed */
        }

        .product-title {
            color: black;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            color: #27ae60; /* Green color for the price */
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .add-to-cart-btn {
            background-color: #3498db; /* Blue color for the button */
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-to-cart-btn:hover {
            background-color: #2980b9; /* Darker blue color on hover */
        }

        /* Additional styles for the cart content */
        #cartContent {
            position: fixed;
            top: 50px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            display: none;
            z-index: 2;
        }
        /* Add this CSS in your <style> tag or external CSS file */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }
        footer {
    background-color: #333;
    color: #fff;
    padding: 2rem 0;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.footer-section {
    flex: 1 1 300px;
    max-width: 300px;
    margin-bottom: 1.5rem;
}

.footer-section h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.footer-section p {
    font-size: 1rem;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.5rem;
}

.footer-section a {
    color: #fff;
    text-decoration: none;
}

.footer-section form {
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
}

.footer-section label {
    margin-bottom: 0.5rem;
}

.footer-section input {
    padding: 0.5rem;
    margin-bottom: 0.5rem;
}

.footer-section button {
    background-color: #3498db;
    color: #fff;
    padding: 0.5rem;
    border: none;
    cursor: pointer;
}

.footer-section button:hover {
    background-color: #2980b9;
}
    </style>
    
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-pz7tG9HUJX1X4aJS21Z2d5q4he3GpcD8ZKu6+TMdA+VA+U/ETI1t5oVL+FLdPGW8Guc7XYb+JMn3uLD+tkXfhw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<?php include 'header.php'; ?>


    <div class="container">
        <?php
        if (!empty($users)) {
            echo '<table>';
            echo '<tr><th>First Name</th><th>Last Name</th><th>Job</th><th>Price</th><th>Action</th></tr>';
        
            // Use foreach to iterate through each user
            foreach ($users as $row) {
                echo '<tr>';
                echo '<td>' . $row['fName'] . '</td>';
                echo '<td>' . $row['lName'] . '</td>';
                echo '<td>' . $row['Job'] . '</td>';
                echo '<td>$' . $row['Price'] . '</td>';
                echo '<td><button onclick="addToCart(' . $row['StaffID'] . ')">Add to Cart</button></td>';
                echo '</tr>';
            }
        
            echo '</table>';
        } else {
            // If no staff members, display a message
            echo '<p>No staff members available.</p>';
        }

        ?>

        <script>
            function addToCart(staffId) {
                // Implement your logic to add the selected staff member to the cart
                // This can involve AJAX requests or any other preferred method
                // For now, let's just alert the staffId for demonstration purposes
                alert('Added staff member with ID ' + staffId + ' to the cart.');
            }
        </script>
    </div>
    <?php if ($isAdminOrStaff) : ?>
    <div id="gymForm">
        <h2>Add a New Services</h2>
        <form action="index.php?controller=service&action=add" method="post" onsubmit="addService(event)">
            <label for="Name">First Name of Service:</label>
            <input type="text" id="fName" name="fName" required>

            <label for="Price">Last Name of Service:</label>
            <input type="text" id="lName" name="lName" required>

            <label for="Type">Username:</label>
            <input type="text" id="Username" name="Username" required>

            <label for="QTY">Email:</label>
            <input type="text" id="Email" name="Email" required>

            <label for="QTY">Job:</label>
            <input type="text" id="Job" name="Job" required>y

            <label for="QTY">Price:</label>
            <input type="text" id="Price" name="Price" required>

            <button type="submit" name="addService">Add Equipment</button>
        </form>
    </div>
<?php endif; ?>
    <?php include 'footer.php'; ?>

</body>
</html>
