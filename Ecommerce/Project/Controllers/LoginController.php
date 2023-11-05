<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "Models/user.php";

class LoginController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        if ($action === 'login') {
            $this->login();
        } else {
            // Handle other actions or show a login form
            $this->render('login');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new User();
            $user = $model->authenticate($username, $password);

            if ($user) {
                // Successfully logged in
                // You can set a session or redirect to another page
                header("Location: welcome.php");
            } else {
                // Failed login, show an error message or redirect to login page
                echo "Invalid username or password. Please try again.";
            }
        }
    }

    public function render($action, $data = []) {
        extract($data);

        include "Views/$action.php";
    }
}
?>