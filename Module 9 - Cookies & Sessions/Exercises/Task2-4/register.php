<?php 

session_start();
if (isset($_SESSION["username"])) {
    header("Location: ./index.php");
}
// Get flash message if any
$flash = $_SESSION['message'] ?? null;
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php if ($flash): ?>
    <div style="color: green;"><?= $flash ?></div>
<?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Store Info</title>
    <style>
        input {
            display: block;
            width: 160px;
        }
        input[type="submit"]{
            margin-top: 5px;
        }
        select {
            width: 160px;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="auth.php?register=1">
    <input type="text" name="username" placeholder="Username" required><br>
    <select name="role" id="">
        <option value="">Pilih Role..</option>
        <option value="username">User</option>
        <option value="admin">Admin</option>
    </select><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</body>
</html>