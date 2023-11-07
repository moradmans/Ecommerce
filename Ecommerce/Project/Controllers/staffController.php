<?php

include_once "Models/staff.php";

class StaffController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new Staff();

        switch ($action) {
            case 'listStaff':
                $data = $model->listStaff();
                break;
            case 'updateStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateStaff($_POST);
                }
                $data = []; 
                break;
            case 'deleteStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteStaff($_POST);
                }
                $data = []; 
                break;
            case 'addStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addStaff($conn, $_POST); 
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

        include "Views/Staff/$action.php";
    }
}

$controller = new HomeController();
$controller->route();
?>
