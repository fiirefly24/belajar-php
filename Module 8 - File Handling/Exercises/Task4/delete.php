<?php 

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    // Get the parameter
    if (!isset($_GET['files'])) {
        die("invalid input!");
    }

    $rawParam = $_GET['files'];

    // Sanitize the param
    $param = htmlspecialchars(strip_tags($rawParam), ENT_QUOTES, "UTF-8");

    // Check files
    $path = "uploads/$param";
    if (!file_exists($path)) {
        die("File doesnt exist!");
    }

    // delete file
    if (!unlink($path)) {
        die("Failed to delete the file!");
    }

    header('Location: index.php');
}
?>