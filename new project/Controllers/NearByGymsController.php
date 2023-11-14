<?php
// Controllers/LoginController.php

include_once "Models/nearByGyms.php";
include_once "dbCon.php";

class NearByGymsController {
    public function route() {
        // Puedes realizar alguna lógica específica aquí si es necesario

        // Llama a la función render para mostrar la vista
        $this->render('NearByGyms/nearByGyms');
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>
