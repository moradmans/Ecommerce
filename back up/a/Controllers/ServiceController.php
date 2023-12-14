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
        if($action == "add"){
            $this->addServices();
           }
        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');
        $isAdminOrStaff = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'staff');
        // Check if the logout form is submitted
        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();

            // Redirect to the login page
            header('Location: index.php?controller=login');
            exit();
        }

        $staffMembers = $this->serviceModel->getAllStaffMembers();
        $isAdminOrStaff = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'staff');

        // Pass the username, isAdmin, and staffMembers to the view
        $this->render('Service/service', ['username' => $username, 'isAdmin' => $isAdmin, 'users' => $staffMembers,'isAdminOrStaff' => $isAdminOrStaff]);
    }
    public function addServices(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fName = isset($_POST['fName']) ? $_POST['fName'] : "";
            $lName = isset($_POST['lName']) ? $_POST['lName'] : "";
            $Username = isset($_POST['Username']) ? $_POST['Username'] : "";
            $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
            $Job = isset($_POST['Job']) ? $_POST['Job'] : "";
            $Price = isset($_POST['Price']) ? $_POST['Price'] : "";

            $dbConnection = new mysqli("localhost", "root", "", "ecommercedatabase");
            $model = new ServiceModel($dbConnection);
            $loginResult = $model->addService($fName, $lName, $Username, $Email,$Job,$Price);
            
        }
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}

?>
