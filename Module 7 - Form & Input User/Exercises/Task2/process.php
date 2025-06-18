<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "POST\n";
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    echo "GET\n";
}
    
?>
