<?php
// Controllers/MainController.php

include_once "Models/main.php";

class MainController {
    public function route() {
        // Check if the user is logged in
        session_start();
        if (!isset($_SESSION['username'])) {
            session_regenerate_id(true);
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            //var_dump($_SESSION);
            exit;
        }
       
        // Retrieve user information from the session
        $username = $_SESSION['username'];
        $isAdmin = isset($_SESSION['type']) && ($_SESSION['type'] === 'admin');
        // Pass the username to the view
        $this->render('Main/main', ['username' => $username, 'isAdmin' => $isAdmin]);

        if (isset($_POST['logout'])) {
            // Destroy the session
            session_destroy();
        
            // Redirect to the login page
            $this->render('Main/main');
            exit();
        }
        
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
