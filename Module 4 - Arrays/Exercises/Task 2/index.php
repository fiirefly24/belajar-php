<?php
$people = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30],
    ["name" => "Charlie", "age" => 20]
];

$approvedAge = array_filter($people, fn($p) => $p["age"] >= 25 );

print_r($approvedAge);

?>