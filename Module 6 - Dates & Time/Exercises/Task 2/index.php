<?php

$today = new DateTime("now", new DateTimeZone("Asia/Jakarta"));

$futureDays = clone $today;
$futureDays = $futureDays->modify("+90 days");
echo "The date 90 days from now: ", $futureDays->format("l, F j, Y\n");

$pastMonths = clone $today;
$pastMonths = $pastMonths->modify("-6 months");
echo "The date 6 months ago from now: ", $pastMonths->format("l, F j, Y\n");


?>