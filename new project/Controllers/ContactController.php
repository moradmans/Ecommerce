<?php
// Controllers/NearByGymController.php

include_once "Models/contact.php";
include_once "dbCon.php";

class ContactController {
    public function route() {
        session_start();
        if (!isset($_SESSION['username'])) {
            // Redirect to the login page if not logged in
            header('Location: index.php?controller=login');
            exit;
        }

        // Retrieve user information from the session
        $username = $_SESSION['username'];
        //var_dump($_SESSION); // Add this line for debugging
        $this->render('Contact/contact', ['username' => $username]);
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
