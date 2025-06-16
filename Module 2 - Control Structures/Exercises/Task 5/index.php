<?php 

$numbers = [0,50,101];

foreach ($numbers as $number) {
    if($number > 100){
        echo "Invalid input - The number $number is more than 100\n";
    }else{
        $oddEven = ($number % 2 == 0) ? "Even" : "Odd";
        echo "The number $number is $oddEven\n";
    }
}

?>