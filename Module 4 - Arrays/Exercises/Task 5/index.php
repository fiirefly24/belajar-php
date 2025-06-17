<?php
    $data = [
        "name" => "John Doe",
        "email" => "john@example.com",
        "address" => [
            "city" => "New York",
            "zip" => "10001"
        ]
    ];

    $name = $data["name"];
    $city = $data["address"]["city"];

    // Qwen: For cleaner
    // [
    //     'name' => $name,
    //     'address' => ['city' => $city]
    // ] = $data;


    echo $name."\n";
    echo $city."\n";
?>
