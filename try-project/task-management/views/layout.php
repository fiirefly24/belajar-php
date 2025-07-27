<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "No Title" ?></title>
    <link rel="stylesheet" href="./assets/css/layout.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <!-- LOADER MODAL -->
    <div id="loader" class="loader active">
        <div class="spinner"></div>
        <p>Loading TaskManager...</p>
    </div>

    <header>
        <nav>
            <svg class="proIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
            <h1><?= $pageTitle ?? "No Title" ?></h1>
            <?php if (!isset($_SESSION["username"])) : ?>
                <?php if ($pageTitle != "Login/Register") : ?>
                    <a href="./login.php">Login</a>
                <?php endif; ?>
            <?php else: ?>
                <div id="user-toggle" data-toggle>
                    <div>
                        <?= $username ?>
                    </div>
                    <div id="user-logout" class="user-logout">
                        <a href="./logout.php">Logout</a>
                    </div>
                </div>


            <?php endif; ?>
        </nav>
    </header>

    <?php if (isset($username)) : ?>
        <main id="main-task">
            <form action="./input.php" method="post" id="task-form" enctype="multipart/form-data">
                <h1 id="task-form-title">Input Task</h1>
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
            <aside>
                <div id="mob-menu" class="nav-circle mob-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512" fill="white" stroke="white" id="icon-mob-menu">
                        <path d=" M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" />
                    </svg>
                </div>
                <div id="mob-input" class="nav-circle mob-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="icon-mob-input">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>

            </aside>
        </main>
    <?php endif; ?>

    <footer>
        <p>Task Manager°2025</p>
    </footer>

    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/layout.js"></script>
</body>

</html>