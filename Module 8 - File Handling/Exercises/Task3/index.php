<?php

$logFile = "app.log";

// Create log file if not exists
if (!file_exists($logFile)) {
    touch($logFile);
}

$handle = fopen($logFile, "a+");

if (!$handle) {
    die("Could not open log file");
}

for ($i = 0; $i < 10; $i++) {
    if (flock($handle, LOCK_EX)) {
        $timeStamp = (new DateTime("now", new DateTimeZone("Asia/Jakarta")))->format("[Y-m-d H:i:s]");
        fwrite($handle, "$timeStamp - Count: $i\n");
        flock($handle, LOCK_UN);
    }
    sleep(1);
}

fclose($handle);
echo "✅ Log appended!";
?>