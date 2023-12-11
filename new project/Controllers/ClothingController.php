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

        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');

        // Call getUsers to retrieve user information
        $this->getItems();

        // Pass the username, isAdmin, and users to the view
        $this->render('Clothing/clothing', ['username' => $username, 'isAdmin' => $isAdmin, 'users' => $this->users]);

        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();

            // Redirect to the login page
            $this->render('Clothing/clothing');
            exit();
        }
    }

    
    public function getItems() {
        // Pass the database connection to the model
        $dbConnection = new mysqli("localhost", "root", "", "ecomdb");
        $model = new ClothingModel($dbConnection); // Update the class name here
        $this->users = $model->displayItems();
    }


    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
