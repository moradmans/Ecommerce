<?php

include_once "Models/user.php";

class UserController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new User();

        switch ($action) {
            case 'listUsers':
                $data = $model->listUsers();
                break;
            case 'updateUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateUsers($_POST);
                }
                $data = []; 
                break;
            case 'deleteUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteUsers($_POST);
                }
                $data = []; 
                break;
            case 'addUsers':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addUsers($conn, $_POST);
                }
                $data = [];
                break;
            default:
                $data = []; 
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
