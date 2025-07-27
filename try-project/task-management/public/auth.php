<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['token'])) {
        die("CSRF attack detected");
    }

    // Get input
    $username = htmlspecialchars(strip_tags($_POST["username"]), ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars(strip_tags($_POST["password"]), ENT_QUOTES, "UTF-8");

    // Load User
    $users = [];
    $path = "../data/users.json";
    if (file_exists($path)) {
        $json = file_get_contents($path);
        $users = json_decode($json, true) ?: [];
    } else {
        file_put_contents(
            $path,
            null
        );
    }

    // Register
    if (isset($_GET["register"])) {
        $role = htmlspecialchars(strip_tags($_POST["role"]), ENT_QUOTES, "UTF-8");
        // Check if username exist
        foreach ($users as $user) {
            if ($user["username"] === $username) {
                $_SESSION["message"] = "Username already taken";
                exit;
            }
        }

        $newUser = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role
        ];

        $users[] = $newUser;

        file_put_contents($path, json_encode($users, JSON_PRETTY_PRINT));

        $_SESSION['message'] = "✅ Registered! You can now log in.";

        header("Location: login.php");
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
        if (!isset($_COOKIE["user"])) {
            setcookie("username", $username, [
                'expires' => time() + 1800,
                'secure' => true,
                'httponly' => true,
            ]);
            echo "cookie is set";
        }
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = "❌ Invalid credentials";
        header("Location: login.php");
        exit;
    }
}
