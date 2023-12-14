<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Apparel</title>
    <link rel=""stylesheet" href="/css/styles.css">
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
    xhr.open('GET', 'Views/ViewCart/viewCart.php', true);

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
<?php include 'header.php'; ?>
    
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
    <?php if ($isAdminOrStaff) : ?>
    <div id="gymForm">
        <h2>Add a New Cloth</h2>
        <form action="index.php?controller=clothing&action=add" method="post" onsubmit="addCloth(event)">
            <label for="Name">Name of the Cloth:</label>
            <input type="text" id="Name" name="Name" required>

            <label for="Price">Cloth Price:</label>
            <input type="text" id="Price" name="Price" required>

            <label for="Size">Size:</label>
            <select id="Size" name="Size" required>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>

            <label for="Type">Type:</label>
            <input type="text" id="Type" name="Type" required>

            <label for="QTY">Quantity:</label>
            <input type="text" id="QTY" name="QTY" required>

            <label for="img">Upload Photo:</label>
            <input type="file" id="img" name="img" accept="image/*">

            <button type="submit" name="addClothe">Add Cloth</button>
        </form>
    </div>
<?php endif; ?>



<?php include 'footer.php'; ?>
</body>
</html>
