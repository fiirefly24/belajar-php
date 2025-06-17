<?php

$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

$email1 = "user@example.com";
$email2 = "invalid-email@com";

$validation = (preg_match($emailPattern, $email1)) ? "valid" : "invalid";

echo $validation;

?>