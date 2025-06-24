<?php

if (!isset($_COOKIE["user"])) {
    // Set a cookie that expires in 1 hour
    setcookie("user", "Ammad", [
    'expires' => time() + 3600,
    'secure' => true,
    'httponly' => true,
    ]);
    echo "cookie is set";
}
echo "cookie already set\n";

print_r($_COOKIE["user"]);

?>
