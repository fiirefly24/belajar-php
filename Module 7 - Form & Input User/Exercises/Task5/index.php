<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['token'])) {
        die("CSRF attack detected");
    }

    $rawComment = $_POST['comment'] ?? '';
    $comment = htmlspecialchars(trim($rawComment), ENT_QUOTES, 'UTF-8');

} else {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(50));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Form</title>
</head>
<body>
    <form method="post">
        <textarea name="comment"></textarea>
        <input type="hidden" name="token" value="<?= $_SESSION['csrf_token'] ?>">
        <button type="submit">Post Comment</button>
    </form>

    <?php if (!empty($comment)): ?>
        <h3>Your Comment:</h3>
        <p><?= $comment ?></p>
    <?php endif; ?>
</body>
</html>