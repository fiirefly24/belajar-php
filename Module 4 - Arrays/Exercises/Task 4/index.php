<?php 
    $products = [
        ["name" => "Laptop", "price" => 1200],
        ["name" => "Phone", "price" => 800],
        ["name" => "Tablet", "price" => 400]
    ];
    
    arsort($products);
    
    // Qwen: Best Practice: Use usort() for Custom Sorting
    // usort($products, fn($a, $b) => $a['price'] <=> $b['price']);

    print_r($products);
?>