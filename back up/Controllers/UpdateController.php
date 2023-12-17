<?php
// Controllers/MainController.php

include_once "Models/update.php";

class UpdateController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        session_start();
        if (!isset($_SESSION['username'])) {
            session_regenerate_id(true);
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            //var_dump($_SESSION);
            exit;
        }elseif ($action === 'update') {
            $this->updateDetails();
        }
       
        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');
        // Pass the username to the view
        $this->render('Update/update', ['username' => $username, 'isAdmin' => $isAdmin]);

        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();
        
            // Redirect to the login page
            $this->render('Update/update');
            exit();
        }
       
        
    }
    public function updateDetails() {
        // Check if the user is logged in
        session_start();
        if (isset($_SESSION['username'])) {
            // Update user details in the database based on the submitted form data
            $userModel = new Update();
            $updateResult = $userModel->updateUserDetails($_POST);

            if ($updateResult) {
                // Fetch updated user details
                $updatedUserData = $userModel->getUserDetails($_SESSION['username']);

                // Update session variable with the new username
                $_SESSION['username'] = $updatedUserData['Username'];

                // Redirect to the details page with a success message
                header('Location: index.php?controller=details&action=index&success=true');
                exit;
            } else {
                // Redirect to the details page with an error message
                header('Location: index.php?controller=details&action=index&error=true');
                exit;
            }
            $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');
        } else {
            // Redirect to the login page if the user is not logged in
            header('Location: index.php?controller=login');
            exit;
        }
    }
    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
