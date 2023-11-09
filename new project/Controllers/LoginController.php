<?php
// Controllers/RegisterController.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new User();
            $loginResult = $model->loginUser($_POST);
    
            if ($loginResult === true) {
                // Login successful, redirect to the main page
                header('Location: index.php?controller=main');
                exit;
            } else {
                // Login failed, set error flag for the view
                $loginError = true;
            }
        }
    
        // Display the login form
        $this->render('Login/login', ['loginError' => $loginError ?? false]);
    }
    

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}


?>