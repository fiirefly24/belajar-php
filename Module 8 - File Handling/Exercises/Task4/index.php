<?php

$listFiles = scandir("uploads");

$listHTML = function($folder) {
    foreach ($folder as $list) {
        if ($list == "." || $list == ".."){
            continue;
        };
        echo "<option value='$list'>$list</option>\n";
    };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Form</title>
</head>
<body>
    <form method="get" action="./delete.php">
        <select name="files" id="">
            <?php 
                $listHTML($listFiles);
            ?>
        </select>
        <button type="submit">Delete File</button>
    </form>
</body>
</html>