<?php

include_once "Models/user.php";

class UserController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new User();

        // Determine the action and call the appropriate method
        switch ($action) {
            case 'listUsers':
                $data = $model->listUsers();
                break;
            case 'updateUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateUsers($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'deleteUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteUsers($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'addUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addUsers($conn, $_POST); // Assuming $conn is defined elsewhere
                }
                $data = []; // You can customize this based on your needs
                break;
            default:
                $data = []; // You can customize this based on your needs
                break;
        }

        $this->render($action, $data);
    }

    public function render($action, $data = []) {
        extract($data);

        include "Views/$action.php";
    }
}

$controller = new UserController();
$controller->route();
?>
