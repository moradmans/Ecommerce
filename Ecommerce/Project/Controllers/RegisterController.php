<?php
include_once "Models/user.php";

class RegisterController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        if ($action === 'register') {
            $this->register();
        } else {
            // Handle other actions or show a registration form
            $this->render('register');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new User();
            $registrationResult = $model->addUsers($_POST);

            if ($registrationResult === true) {
                // Registration successful
                header("Location: index.php?controller=index&action=index");
            } else {
                // Registration failed, show an error message or redirect to the registration page
                echo "Registration failed. Please try again.";
            }
        }
    }

    public function render($action, $data = []) {
        extract($data);

        include "Views/$action.php";
    }
}
?>