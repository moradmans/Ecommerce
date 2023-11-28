<?php
include_once "Models/details.php";
include_once "dbCon.php";

class DetailsController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action === 'index') {
            // Check if the user is logged in
            session_start();
            if (isset($_SESSION['username'])) {
                $this->displayDetails($_SESSION['username']);
            } else {
                // Redirect to the login page if the user is not logged in
                header('Location: index.php?controller=login');
                exit;
            }
        } elseif ($action === 'update') {
            $this->updateDetails();
        } else {
            // Handle other actions as needed
        }
    }

    public function displayDetails($username) {
        // Fetch user details from the database using the $username
        $userModel = new User();
        $userData = $userModel->getUserDetails($username);

        // Render the view with user data
        $this->render('Details/details', ['userData' => $userData, 'username' => $username]);
    }

    public function updateDetails() {
        // Check if the user is logged in
        session_start();
        if (isset($_SESSION['username'])) {
            // Update user details in the database based on the submitted form data
            $userModel = new User();
            $updateResult = $userModel->updateUserDetails($_SESSION['username'], $_POST);

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
