<?php

// session_set_cookie_params([
//     'lifetime' => 0,
//     'path' => '/',
//     'domain' => 'localhost',
//     'secure' => true,
//     'httponly' => true,
//     'samesite' => 'Lax'
// ]);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    // Load users
    $users = [];
    if (file_exists('users.json')) {
        $json = file_get_contents('users.json');
        $users = json_decode($json, true) ?: [];
    }

    if (isset($_GET['register'])) {
        // Check if user exists
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                $_SESSION['message'] = "❌ Username already taken";
                header("Location: index.php");
                exit;
            }
        }

        // Add new user
        $newUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $users[] = $newUser;

        // Save back to JSON
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

        $_SESSION['message'] = "✅ Registered! You can now log in.";
        header("Location: index.php");
        exit;
    }

    // Login
    $valid = false;

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $valid = true;
            break;
        }
    }

    if ($valid) {
        session_regenerate_id(true); // Prevent session fixation
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'user';
        $_SESSION['message'] = "✅ Login successful!";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = "❌ Invalid credentials";
        header("Location: index.php");
        exit;
    }
}