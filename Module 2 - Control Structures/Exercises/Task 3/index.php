<?php 
for ($i=0; $i <= 50; $i++) { 
    if ($i % 3 == 0) {
        continue;
    } elseif ($i == 25){
        echo $i."\n";
        break;
    } else {
        echo $i."\n";
    }
}
?>