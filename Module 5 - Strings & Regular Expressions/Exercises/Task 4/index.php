<?php 

$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/";

$password = "Password123";
if (strlen($password) > 8 && preg_match($passwordPattern, $password)) {
    echo "Strong password";
} else {
    echo "Weak password";
}
?>