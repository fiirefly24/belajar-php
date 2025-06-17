<?php
$people = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30],
    ["name" => "Charlie", "age" => 20]
];

$addStatus = function($people) {
    if ($people["age"] >= 25){
        $people["status"] = "approved";
        return $people;
    }

    $people["status"] = "pending";
    return $people;
};

$peoples = array_map(fn($p) => $addStatus($p), $people);

    // Qwen: Simplify
    // $peoples = array_map(function($person) {
    //     $person['status'] = $person['age'] >= 25 ? 'approved' : 'pending';
    //     return $person;
    // }, $people);

print_r($peoples);

?>