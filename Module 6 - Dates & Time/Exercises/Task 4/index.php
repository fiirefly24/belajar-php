<?php 

$date1 = new DateTime("2025-04-05");
$date2 = new DateTime("2025-04-10");

$difference = $date1->diff($date2);

echo $difference->format("Difference: %d days, %h hours, %i minutes")

?>