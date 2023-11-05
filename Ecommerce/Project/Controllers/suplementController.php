<?php

include_once "Models/user.php";

class SuplementController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new Suplement();

        // Determine the action and call the appropriate method
        switch ($action) {
            case 'listSuplement':
                $data = $model->listSuplement();
                break;
            case 'updateSuplement':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateSuplement($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'deleteSuplement':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteSuplement($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'addSuplement':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addSuplement($conn, $_POST); // Assuming $conn is defined elsewhere
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

        include "Views/Suplement/$action.php";
    }
}

$controller = new HomeController();
$controller->route();
?>
