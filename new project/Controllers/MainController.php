<?php
// Controllers/MainController.php

include_once "Models/main.php";

class MainController {
    public function route() {
        // Check if the user is logged in
        session_start();
        if (!isset($_SESSION['username'])) {
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            exit;
        }

        // Retrieve user information from the session
        $username = $_SESSION['username'];

        // Pass the username to the view
        $this->render('Main/main', ['username' => $username]);
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
