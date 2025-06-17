<?php
    $scores = [85, 90, 78, 92];
    
    $sum = array_reduce($scores, fn($carry, $num) => $carry + $num, 0);

    echo $sum;
?>