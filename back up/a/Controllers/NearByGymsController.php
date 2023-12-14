<?php
// Controllers/NearByGymController.php

include_once "Models/nearByGyms.php";
include_once "dbCon.php";

class NearByGymsController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        session_start();
        if (!isset($_SESSION['username'])) {
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            exit;
        }
       if($action == "delete"){
        $this->deleteGym();
       }

        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');

        // Check if the user type is admin or staff
        $isAdminOrStaff = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin' || $_SESSION['type'] === 'staff');

        // Pass the username and isAdminOrStaff to the view
        $this->render('NearByGyms/nearByGyms', ['username' => $username, 'isAdmin' => $isAdmin,'isAdminOrStaff' => $isAdminOrStaff]);

        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();

            // Redirect to the login page
            $this->render('NearByGyms/nearByGyms');
            exit();
        }

        // Check if the form is submitted and the user is admin or staff
        if ($isAdminOrStaff && isset($_POST['addGym']) && isset($_POST['gymName']) && isset($_POST['gymAddress'])) {
            $gymModel = new Gym();
            $result = $gymModel->addGym($_POST['gymName'], $_POST['gymAddress']);
        
            if ($result) {
                // Gym added successfully, you may redirect or display a success message
                //echo "Gym added successfully!";
            } else {
                // Failed to add gym, handle accordingly (e.g., display an error message)
                echo "Failed to add gym.";
            }
        }
    }
    public function deleteGym() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $address = isset($_POST['address']) ? $_POST['address'] : "";
            $model = new Gym();
            $loginResult = $model->deleteGym($address);
            
        }
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
