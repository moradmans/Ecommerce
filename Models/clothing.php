<?php
include_once "dbCon.php";

class ClothingModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayItems() {
        $query = "SELECT * FROM clothing";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Handle the error (e.g., log it or return an empty array)
            return [];
        }

        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
    public function addToCart($productId, $productName, $quantity, $price) {
        // Perform any additional validation or logic if needed

        // Add the product to the cart table
        $sql = "INSERT INTO cart (ProductID, ProductName, Quantity, Price) VALUES ('$productId', '$productName', '$quantity', '$price')";
        $result = $this->conn->query($sql);

        return $result;
    }
    public function viewCart() {
        $query = "SELECT * FROM cart";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Handle the error (e.g., log it or return an empty array)
            return [];
        }

        $cartItems = $result->fetch_all(MYSQLI_ASSOC);
        var_dump($cartItems);
        return $cartItems;
    }

    public function removeFromCart($cartItemId) {
        // Perform any additional validation or logic if needed

        // Remove the item from the cart table
        $sql = "DELETE FROM cart WHERE CartItemID = '$cartItemId'";
        $result = $this->conn->query($sql);

        return $result;
    }

}


?>
