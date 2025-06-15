<?php 
$numStr = "123";
$numInt = (int)$numStr;
$numFloat = (float)$numInt;

echo "The value of \$numStr is $numStr (".gettype($numStr).")\n";
echo "The value of \$numInt is $numInt (".gettype($numInt).")\n";
echo "The value of \$numFloat is $numFloat (".gettype($numFloat).")\n";
?>