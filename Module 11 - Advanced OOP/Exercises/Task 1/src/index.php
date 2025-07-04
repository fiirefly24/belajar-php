<?php

require_once 'Models/User.php';
require_once 'Controllers/UserController.php';

$controller = new App\Controllers\UserController();
$controller->index();
?>