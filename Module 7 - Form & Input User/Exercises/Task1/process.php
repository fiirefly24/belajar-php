<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["username"];
    $email = $_POST["email"];

    if (empty($name) || empty($email)) {
        echo "All fields are required.";
        exit;
    }

    $safeName = htmlspecialchars(trim($name), ENT_QUOTES, 'UTF-8');
    $safeEmail = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    if (!$safeEmail) {
        echo "Invalid email format.";
        exit;
    }

    echo "Username: $safeName\n";
    echo "Email: $safeEmail\n";
} 

?>
