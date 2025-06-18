<?php 

$start = microtime(true);

$total = 0;
for ($i=0; $i < 1000000; $i++) { 
    $total += sqrt($i);
}

$end = microtime(true);

echo "Execution time: " . round($end - $start, 2) . " seconds\n";
?>