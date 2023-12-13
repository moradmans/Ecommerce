<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Apparel</title>

    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="updated-integrity-value" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel=""stylesheet" href="/css/styles.css">


    <script>
     function addToCart(productId, name, quantity, price) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=equipment&action=addToCart', true);
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
    xhr.open('GET', 'index.php?controller=equipment&action=addToCart', true);

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
            xhr.open('POST', 'index.php?controller=equipment&action=removeFromCart', true);
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
<?php include 'header.php'; ?>

    
<section class="content">
        <ul class="product-list">
            <?php
            foreach ($users as $user) {
                echo "<li class='product-item'>";
                // Display the image using data URI with width and height attributes
                echo "<img src='data:image/jpeg;base64," . base64_encode($user['img']) . "' alt='{$user['Name']}' width='250' height='250'>";
                echo "<div class='product-title'>{$user['Name']}</div>";
                echo "<div class='product-price'>\${$user['Price']}</div>";
                echo "<button class='add-to-cart-btn' onclick='addToCart({$user['SuppID']}, \"{$user['Name']}\", 1, {$user['Price']})'>Add to Cart</button>";
                echo "</li>";
            }
            
            if (empty($users)) {
                echo "<li>No products found.</li>";
            }
            ?>
        </ul>
    </section>
    <div id="cartContent"></div>


    <?php include 'footer.php'; ?>

</body>
</html>
