<?php

session_start();
include_once 'Models/service.php';

class ServiceController {
    private $serviceModel;

    public function __construct() {
        $conn = new mysqli("localhost", "root", "", "ecommercedatabase");
        $this->serviceModel = new ServiceModel($conn);
    }

    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        // Check if the user is not logged in
        if (!isset($_SESSION['username'])) {
            session_regenerate_id(true);
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            exit;
        }

        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');

        // Check if the logout form is submitted
        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();

            // Redirect to the login page
            header('Location: index.php?controller=login');
            exit();
        }

        $staffMembers = $this->serviceModel->getAllStaffMembers();

        // Pass the username, isAdmin, and staffMembers to the view
        $this->render('Service/service', ['username' => $username, 'isAdmin' => $isAdmin, 'users' => $staffMembers]);
    }


    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}

?>
