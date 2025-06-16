<?php 
function addOne(&$num) {
    $num++;
}

$a = 5;
addOne($a);
echo $a;
?>