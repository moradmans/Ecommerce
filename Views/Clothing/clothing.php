<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Apparel</title>
    <style>
        /* General styles for the body and header */
        body {
            background-color: #f0f0f0;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: 'Arial', sans-serif;
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

/* Footer styles */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="updated-integrity-value" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <script>
     function addToCart(productId, name, quantity, price) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=clothing&action=addToCart', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
        }
    };

    // Send the data as a URL-encoded string
    var data = 'productId=' + productId + '&productName=' + encodeURIComponent(name) + '&quantity=' + quantity + '&price=' + price;
    xhr.send(data);
    console.log('Data sent:', data);
}
function showCart() {
    console.log('Basket icon clicked!');
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'Views/Clothing/viewCart.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var cartContent = xhr.responseText;

            // Update the content area with the cart content
            document.getElementById('cartContent').innerHTML = cartContent;
        }
    };

    // Send the request
    xhr.send();
}
function removeFromCart(cartItemId) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'index.php?controller=clothing&action=removeFromCart', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    // Handle the response as needed (e.g., refresh the cart view)
                    location.reload();
                }
            };

            // Send the data as a URL-encoded string
            var data = 'cartItemId=' + cartItemId;
            xhr.send(data);
            console.log('Data sent:', data);
        }

</script>
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
    <i class="fas fa-shopping-cart" onclick='showCart()'></i> <!-- Shopping cart icon -->

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
    
<section class="content">
        <ul class="product-list">
            <?php
            foreach ($users as $user) {
                echo "<li class='product-item'>";
                // Display the image using data URI with width and height attributes
                echo "<img src='data:image/jpeg;base64," . base64_encode($user['img']) . "' alt='{$user['Name']}' width='250' height='250'>";
                echo "<div class='product-title'>{$user['Name']}</div>";
                echo "<div class='product-price'>\${$user['PRICE']}</div>";
                echo "<button class='add-to-cart-btn' onclick='addToCart({$user['ProductID']}, \"{$user['Name']}\", 1, {$user['PRICE']})'>Add to Cart</button>";
                echo "</li>";
            }
            
            if (empty($users)) {
                echo "<li>No products found.</li>";
            }
            ?>
        </ul>
    </section>
    <div id="cartContent"></div>


<footer>
    <div class="footer-section">
        <h3>ABOUT US</h3>
        <p>We are a company where we provide different services and products to help you through your journey of being healthy</p>
    </div>

    <div class="footer-section">
        <h3>IMPORTANT LINKS</h3>
        <ul>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Shipping Policy</a></li>
            <li><a href="#">Terms Of Service</a></li>
            <li><a href="#">Cancellation Policy</a></li>
            <li><a href="#">Ambassador Program</a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h3>NEWSLETTER</h3>
        <p>Promotions, new products and sales.<br>Directly to your inbox.</p>
        <form action="#" method="post">
            <label for="email">Enter your email address</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">SUBSCRIBE</button>
        </form>
    </div>
</footer>
</body>
</html>
