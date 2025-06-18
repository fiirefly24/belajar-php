<?php
$comment = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawComment = $_POST['comment'] ?? '';
    $comment = htmlspecialchars(trim($rawComment), ENT_QUOTES, 'UTF-8');
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
        <button type="submit">Post Comment</button>
    </form>

    <?php if (!empty($comment)): ?>
        <h3>Your Comment:</h3>
        <p><?= $comment ?></p>
    <?php endif; ?>
</body>
</html>