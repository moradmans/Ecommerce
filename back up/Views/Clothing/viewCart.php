<!-- Views/Clothing/viewCart.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>
    /* Styles for the cart modal */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Styles for the cart list */
    .cart-list {
        list-style: none;
        padding: 0;
    }

    .cart-list li {
        margin-bottom: 10px;
    }
</style>

<script>
    function closeCart() {
        document.getElementById('cartModal').style.display = 'none';
    }
</script>

</head>
<body>
    <p>Hello World</p>
<div id="cartModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCart()">&times;</span>
        <h2>Your Shopping Cart</h2>
        <ul class="cart-list">
            <?php if (isset($cartItems) && is_array($cartItems) && !empty($cartItems)): ?>
                <?php foreach ($cartItems as $cartItem): ?>
                    <li>
                        <?= $cartItem['ProductName'] ?> - Quantity: <?= $cartItem['Quantity'] ?> - Price: $<?= $cartItem['Price'] ?>
                        <button onclick="removeFromCart(<?= $cartItem['CartItemID'] ?>)">Remove</button>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No items in the cart.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>  
</body>
</html>