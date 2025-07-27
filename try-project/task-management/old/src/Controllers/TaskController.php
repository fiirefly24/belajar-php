<?php

$tasks = [];
if (file_exists('../../../data/tasks.json')) {
    $json = file_get_contents('../../../data/tasks.json');
    $tasks = json_decode($json, true) ?: [];
}

function renderTaskCard(array $task): string
{
    $id = htmlspecialchars($task['id'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8');
    $submittedBy = htmlspecialchars($task['submittedBy'], ENT_QUOTES, 'UTF-8');
    $status = ucfirst(htmlspecialchars($task['status'], ENT_QUOTES, 'UTF-8'));
    $description = nl2br(htmlspecialchars($task['description'], ENT_QUOTES, 'UTF-8'));

    return <<<HTML
<div class="task-card">
    <div class="task-header">
        <span>$title</span>
        <span>Status: <strong>$status</strong></span>
    </div>
    <div class="task-submitted-by">
        Submitted by: <strong>$submittedBy</strong>
    </div>
    <div class="task-details">
        <p><strong>Description:</strong> $description</p>
        <p><strong>Created at:</strong> {$task['createdAt']}</p>
        <p><strong>Assigned to:</strong> {$task['assignedTo']} ?? 'Not assigned'</p>
    </div>
</div>
HTML;
}
