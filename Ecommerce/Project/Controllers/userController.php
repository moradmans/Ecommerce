<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "Models/TeacherModel.php";

class LoginController {
    function route() {
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";
        $id = (isset($_GET['id'])) ? $_GET['id'] : -1;

        if($action == "index") {
            // get all teachers
            $teachers = Teacher::listTeachers();
            $this->render("index", $teachers);
        }
        else {
            $teacher = new Teacher($id);
            $this->render($action, array($teacher));
        }
    }

    function render($view, $data = []) {
        extract($data);

        include "Views/$view.php";
    }
}
?>