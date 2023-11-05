<?php

include_once "Models/staff.php";

class StaffController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new Staff();

        // Determine the action and call the appropriate method
        switch ($action) {
            case 'listStaff':
                $data = $model->listStaff();
                break;
            case 'updateStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateStaff($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'deleteStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteStaff($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'addStaff':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addStaff($conn, $_POST); // Assuming $conn is defined elsewhere
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

        include "Views/Staff/$action.php";
    }
}

$controller = new HomeController();
$controller->route();
?>
