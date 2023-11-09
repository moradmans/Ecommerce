<?php
include_once "Models/User.php";

class RegisterController {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';

        if ($action === 'register') {
            $this->register();
        } else {
            $this->render('register_form');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new User();
            $result = $model->addUsers($_POST); 
            
            if ($result === true) {
                header("Location: index.php"); 
            } else {
                echo "Registration failed. Please try again.";
            }
        }
    }

    public function render($view) {
        include "Views/$view.php"; 
    }
}

$controller = new RegisterController();
$controller->route();
?>
