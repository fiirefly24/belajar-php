<?php

if (!file_exists("hello.txt")) {
    file_put_contents("hello.txt", "Hello, world!\n");
}

echo file_get_contents("hello.txt");

?>
