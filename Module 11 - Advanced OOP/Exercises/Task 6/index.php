<?php

require_once 'UserRepositoryInterface.php';
require_once 'DatabaseUserRepository.php';
require_once 'FileUserRepository.php';

function listUsers(UserRepositoryInterface $repo) {
    foreach ($repo->all() as $user) {
        echo $user['name'] . "\n";
    }
}

// Try database version
$repo = new DatabaseUserRepository();
listUsers($repo);

// Try file version
$repo = new FileUserRepository();
listUsers($repo);
?>