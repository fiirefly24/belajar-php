<?php 
$input = 45;

// If-else
if ($input % 2 == 0){
    echo "Input: $input --> Output: Even\n";
} else {
    echo "Input: $input --> Output: Odd\n";
}

// Ternary Operator
$output = ($input % 2 == 0) ?  "Even\n" : "Odd\n";
echo "Input: $input --> Output: $output";

?>