<?php
// getGyms.php

include_once "Models/nearByGyms.php";

$gymModel = new Gym();
$gyms = $gymModel->getGyms();

header('Content-Type: application/json');
echo json_encode($gyms);
?>