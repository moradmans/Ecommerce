<?php

include_once "Models/clothing.php";

class ClothingController {
    public function route() {
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';

        $model = new Clothing();

        switch ($action) {
            case 'listClothing':
                $data = $model->listClothing();
                break;
            case 'updateClothing':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->updateClothing($_POST);
                }
                $data = []; 
                break;
            case 'deleteClothing':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->deleteClothing($_POST);
                }
                $data = []; 
                break;
            case 'addClothing':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $model->addClothings($conn, $_POST); 
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

        include "Views/Clothing/$action.php";
    }
}

$controller = new ClothingController();
$controller->route();
?>
