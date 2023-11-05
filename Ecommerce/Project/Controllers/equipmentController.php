<?php

include_once "Models/equipment.php";

class EquipmentController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new Equipment();

        // Determine the action and call the appropriate method
        switch ($action) {
            case 'listEquipment':
                $data = $model->listEquipment();
                break;
            case 'updateEquipment':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateEquipment($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'deleteEquipment':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteEquipment($_POST);
                }
                $data = []; // You can customize this based on your needs
                break;
            case 'addEquipment':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addEquipment($conn, $_POST); // Assuming $conn is defined elsewhere
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

        include "Views/Equipment/$action.php";
    }
}

$controller = new EquipmentController();
$controller->route();
?>
