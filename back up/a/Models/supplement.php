<?php
include_once "dbCon.php";

class SupplementModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayItems() {
        $query = "SELECT * FROM supplements"; // Update table name to "supplement"
        $result = $this->conn->query($query);

        if ($result === false) {
            // Handle the error (e.g., log it or return an empty array)
            return [];
        }

        $items = $result->fetch_all(MYSQLI_ASSOC);
        return $items;
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
    public function addSupplement($Price, $QTY, $Name, $Type,$img){
        global $conn;
    
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO supplements (Price, QTY, Name, Type, img) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        
        $stmt->bind_param('dissb', $Price, $QTY, $Name, $Type, $img);
    
        $result = $stmt->execute();
    
        // Check if the execution was successful
        if ($result) {
            $stmt->close();
            return true; // Assuming you want to return a boolean indicating success
        } else {
            // Handle the error if needed
            echo "Error: " . $stmt->error;
            $stmt->close();
            return false; // Failed to delete gym
        }
        
    }
}
?>
