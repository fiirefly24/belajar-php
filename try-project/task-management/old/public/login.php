<?php
require_once "../views/layout.php";
session_start();

if (isset($_SESSION["username"])) {
    header("Location: ./index.php");
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(50));
}

// Get flash message if any
$flash = $_SESSION['message'] ?? null;
unset($_SESSION['message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Store Info</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <?php if ($flash): ?>
        <div style="color: green;"><?= $flash ?></div>
    <?php endif; ?>
    <div id="form-container" class="form-container">
        <form id="login-form" class="form login-form" action="auth.php" method="post">
            <h1 style="margin-bottom: 6dvh; margin-top: 8dvh">Login Page</h1>
            <label for="username">Username</label>
            <input type="text" name="username" id="">
            <label for="password">Password</label>
            <input type="password" name="password" id="">
            <input type="hidden" name="toke" value="<?= $_SESSION['csrf_token'] ?>">
            <button type="submit">Login</button>
            <a onclick="collapse()">Register</a>
        </form>
        <form id="register-form" class="form register-form" method="post" action="auth.php?register=1">
            <h1 style="margin-bottom: 2dvh;">Register Page</h1>
            <label for="username">Username</label>
            <input type="text" name="username" required><br>
            <label for="role">Select Role</label>
            <select name="role" id="">
                <option value="">Select Role..</option>
                <option value="username">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <label for="password">Password</label>
            <input type="password" name="password" required><br>
            <a onclick="collapse()">Login</a>
            <button type="submit">Register</button>
        </form>
        <div id="form-band" class="form-band"></div>
    </div>
    <script src="./assets/js/app.js"></script>
</body>

</html>