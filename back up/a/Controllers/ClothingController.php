<?php
include_once "Models/clothing.php";
include_once "dbCon.php";

class ClothingController {
    private $users; // Add this property to store users retrieved from the model

    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        session_start();
    
        if (!isset($_SESSION['username'])) {
            session_regenerate_id(true);
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            exit;
        }
        if ($action == 'add') {
            $this->addCloth();
        }
        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');
        $isAdminOrStaff = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'staff');
    
        $this->getItems();
    
        $this->render('Clothing/clothing', ['username' => $username, 'isAdmin' => $isAdmin, 'users' => $this->users,'isAdminOrStaff' => $isAdminOrStaff]);
    
        // Handle actions after rendering the main view
        if ($action == 'addToCart') {
            $this->addToCart();
        }
    
        // Handle logout separately
        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();
    
            // Redirect to the login page
            header('Location: index.php?controller=login');
            exit();
        }
    }
    public function addCloth(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Price = isset($_POST['Price']) ? $_POST['Price'] : "";
            $QTY = isset($_POST['QTY']) ? $_POST['QTY'] : "";
            $Name = isset($_POST['Name']) ? $_POST['Name'] : "";
            $Type = isset($_POST['Type']) ? $_POST['Type'] : "";
            $img = isset($_POST['img']) ? $_POST['img'] : "";

            $dbConnection = new mysqli("localhost", "root", "", "ecommercedatabase");
            $model = new ClothingModel($dbConnection);
            $loginResult = $model->addaddCloth($Price, $QTY, $Name, $Type,$img);
            
        }
    }
    public function getItems() {
        // Pass the database connection to the model
        $dbConnection = new mysqli("localhost", "root", "", "ecommercedatabase");
        $model = new ClothingModel($dbConnection); // Update the class name here
        $this->users = $model->displayItems();
    }

    public function addToCart() {
        // Retrieve data from the AJAX request
        $productId = isset($_POST['productId']) ? $_POST['productId'] : '';
        $productName = isset($_POST['productName']) ? $_POST['productName'] : '';
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
    
        // Create an instance of ClothingModel
        $dbConnection = new mysqli("localhost", "root", "", "ecommercedatabase");
        $this->clothingModel = new ClothingModel($dbConnection);
    
        // Call the model function to add to cart
        $result = $this->clothingModel->addToCart($productId, $productName, $quantity, $price);
    
        // Respond to the AJAX request
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
    public function viewCart() {
        // Create an instance of ClothingModel
        $dbConnection = new mysqli("localhost", "root", "", "ecommercedatabase");
        $this->clothingModel = new ClothingModel($dbConnection);
        
        // Call the model function to retrieve cart items
        $cartItems = $this->clothingModel->viewCart();
        
        // Render the cart content as HTML
        ob_start();
        include "Views/Clothing/viewCart.php";
        $cartContent = ob_get_clean();
        
        // Return the cart content
        return $cartContent;
    }

    public function removeFromCart() {
        // Retrieve data from the AJAX request
        $cartItemId = isset($_POST['cartItemId']) ? $_POST['cartItemId'] : '';

        // Call the model function to remove from cart
        $result = $this->clothingModel->removeFromCart($cartItemId);

        // Respond to the AJAX request
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
