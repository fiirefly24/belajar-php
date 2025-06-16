<?php 
$x = 10;

function test() {
    $x = 20;
    echo $x;
}

test();
echo $x;

// The test function is print local $x which the ouput is 20
// While the other echo $x is printing the global $x which the ouput is 10
?>