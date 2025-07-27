<?php
session_start();

$pageTitle = "Task Manager";
$username = "";
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}

require_once("../views/layout.php");
require_once("../reuseable/mobile_table.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

</body>

</html>