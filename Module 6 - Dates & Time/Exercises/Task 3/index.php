<?php

$date = new DateTime("now", new DateTimeZone("UTC"));

$london = clone $date;
$london = $london->setTimezone(new DateTimeZone("Europe/London"));

$tokyo = clone $date;
$tokyo = $tokyo->setTimezone(new DateTimeZone("Asia/Tokyo"));

$losAngeles = clone $date;
$losAngeles = $losAngeles->setTimezone(new DateTimeZone("America/Los_Angeles"));

echo $london->format("Y-m-d H:i:s T\n");
echo $tokyo->format("Y-m-d H:i:s T\n");
echo $losAngeles->format("Y-m-d H:i:s T\n");

?>