<?php

$today = new DateTime("now", new DateTimeZone("Asia/Jakarta"));
echo "Today is ", $today->format('l, F  j, Y');

?>