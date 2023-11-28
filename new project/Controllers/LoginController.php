<?php
// Controllers/LoginController.php

include_once "Models/login.php";
include_once "dbCon.php";

class LoginController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action === 'login') {
            $this->login();
        } else {
            // Display the login form
            $this->render('Login/login');
        }
    }

    public function login() {
        $loginError = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new User();
            $loginResult = $model->loginUser($_POST);
    
            if ($loginResult === true) {
                // Login successful, start a session and store user information
                session_start();
                $_SESSION['username'] = $_POST['username'];

                // Fetch user type from the database and store it in the session
                $userType = $model->getUserType($_POST['username']); // Assuming a method like getUserType exists in your User model
                $_SESSION['type'] = $userType;
                
                // Redirect to the main page
                header('Location: index.php?controller=main');
                exit;
            } else {
                // Login failed, set error flag for the view
                $loginError = true;
            }
        }
    
        // Display the login form
        $this->render('Login/login', ['loginError' => $loginError]);
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
