<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        die("XSS ATTACK DETECTED!");
    }

    if ($_SESSION["role"] == "admin") {
        return;
    }

    $tasks = [];
    $path = "../data/tasks.json";
    if (file_exists($path)) {
        $json = file_get_contents($path);
        $tasks = json_decode($json, true) ?: [];
    } else {
        file_put_contents(
            $path,
            null
        );
        die("no file");
    }

    $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    $description = htmlspecialchars($_POST["description"], ENT_QUOTES, "UTF-8");
    $category = $_POST["category"];
    $priority = $_POST["priority"];
    $timestamp = (new DateTime("now", new DateTimeZone("Asia/Jakarta")))->format("Y-m-d H:i:s");
    $assign = "admin";
    $lastID = end($tasks);
    $nextID = (int)$lastID["id"] + 1;

    $newTask = [
        "id" => $nextID,
        "title" => $title,
        "category" => $category,
        "priority" => $priority,
        "description" => $description,
        "status" => "pending",
        "submittedBy" => $_SESSION["username"],
        "assignedTo" => "Admin",
        "createdAt" => $timestamp
    ];

    $tasks[] = $newTask;

    file_put_contents($path, json_encode($tasks, JSON_PRETTY_PRINT));

    $_SESSION['message'] = " Task Submitted!✅ ";

    header("Location: ./");
    exit;
}
