<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawName = $_POST['username'];
    $rawEmail = $_POST['email'];

    // Sanitize
    $name = trim(strip_tags($rawName));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (empty($name) || !$email) {
        echo "Please fill all fields correctly.";
        exit;
    }

    echo "Name: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "\n";
    echo "Email: $email\n";
}

?>
