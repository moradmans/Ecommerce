<?php
// index.php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'main';
$action = (isset($_GET['action'])) ? $_GET['action'] : "index";
$id = (isset($_GET['id'])) ? intval($_GET['id']) : -1;

$controllerClassName = ucfirst($controller) . 'Controller';
include_once "Controllers/$controllerClassName.php";

$ct = new $controllerClassName();
$ct->route();

?>