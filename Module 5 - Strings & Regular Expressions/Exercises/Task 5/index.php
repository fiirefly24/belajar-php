<?php

$text1 = "I ❤️ coding!";
$text2 = "Just plain text";

$emojiPattern = "/[\x{2600}-\x{1F9FF}]/u";

if (preg_match($emojiPattern,$text1)) {
    echo "contains emoji\n";
}

if (!preg_match($emojiPattern,$text2)) {
    echo "no emoji\n";
}

?>
