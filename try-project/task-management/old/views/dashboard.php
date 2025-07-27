<?php require_once "../views/layout.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <main>
        <h1 id="task-form-title">Input Task</h1>
        <form action="" method="post" id="task-form">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

            <label for="title">Task Title</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="printer">Printer Issue</option>
                <option value="software">Software Problem</option>
                <option value="hardware">Hardware Fault</option>
                <option value="network">Network / Internet</option>
                <option value="network">Others</option>
            </select>

            <label for="priority">Priority</label>
            <select id="priority" name="priority" required>
                <option value="">Select Priority</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>

            <label for="attachment">Attachment (Optional)</label>
            <input type="file" id="attachment" name="attachment" accept=".jpg,.png,.pdf,.docx">

            <button type="submit">Submit Task</button>
        </form>
    </main>
</body>

</html>