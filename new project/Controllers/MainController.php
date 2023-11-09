<?php

include_once "Models/main.php";

class MainController {
    public function route() {
        $this->render('Main/main');
    }

    public function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}

?>
