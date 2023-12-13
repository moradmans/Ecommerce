<?php
// Controllers/RegisterController.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "Models/register.php";
include_once "dbCon.php";

class RegisterController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'register';

        if ($action === 'register') {
            $this->register();
        } else {
            $this->render('Register/register');
        }
        
    }

    public function register() {
        $this->render('Register/register');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if POST data is being sent
            if (!empty($_POST)) {
                echo "POST data is being sent:";
                var_dump($_POST);
            } else {
                echo "No POST data received.";
            }
    
            $model = new User();
            $registrationResult = $model->addUsers($_POST);
    
            if ($registrationResult === true) {
                // Registration successful
                echo "Registration successful!";
                // You can add a redirect here if desired
            } else {
                // Registration failed, show an error message or redirect to the registration page
                echo "Registration failed. Please try again.";
                // You can also output the error message for further debugging
                echo "Error: " . $registrationResult;
            }
        }
    }
    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}

?>