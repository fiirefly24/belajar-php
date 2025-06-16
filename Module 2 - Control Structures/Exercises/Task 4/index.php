<?php 
$users = [
    ["name" => "Alice", "role" => "admin"],
    ["name" => "Bob", "role" => "user"],
    ["name" => "Charlie", "role" => "editor"]
];

foreach ($users as $user) {
    echo "Name: $user[name] - Role: $user[role]\n";
}
?>