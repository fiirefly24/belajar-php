
<?php 

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
    <style>
        input {
            display: block;
        }
        input[type="submit"]{
            margin-top: 5px;
            display: inline;
        }
        a {
            text-decoration: none;
            color: navy;
        }
    </style>
</head>
<body>
    <?php if ($flash): ?>
    <div style="color: green;"><?= $flash ?></div>
<?php endif; ?>
    <div class="form">
        <h1>Login Page</h1>
        <form action="auth.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="">
            <label for="password">Password</label>
            <input type="password" name="password" id="">
            <input type="hidden" name="toke" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="submit" value="Login">
            <a href="./register.php">Register</a>
        </form>
    </div>

</body>
</html>