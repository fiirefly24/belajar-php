<?php 

class Math {
    public function __call($name, $arguments)
    {
        if ($name === "add") {
            return array_sum($arguments);
        }

        if ($name === "multiply") {
            return array_reduce($arguments, fn($carry, $num) => $carry * $num, 1);
        }

        if ($name === "square") {
            return array_reduce($arguments, fn($carry, $num) => pow($num,2) , 1);
        }

    }

    public function __invoke()
    {
        echo "This is what Invoke does";
    }
}

$math = new Math();
echo $math->add("21","23") . "\n";
echo $math->multiply("2", "3")  . "\n";
echo $math->square(3)  . "\n";
$math();
?>