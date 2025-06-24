<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ./login.php");
}

// Get flash message if any
$flash = $_SESSION['message'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<?php if ($flash): ?>
    <div style="color: green;" class="flash"><?= $flash ?></div>
<?php endif; ?>

<h1>Welcome <?= $_SESSION["username"]?></h1>
<h2>You have <?= $_SESSION["role"] ?> Access</h2>

<form action="./logout.php">
<input type="submit" value="logout">
</form>

</body>
</html>