<?php

$input = trim(fgets(STDIN));
$carInfo = explode(" ", $input);
if ($carInfo[0] != 'car') {
    echo "Invalid input";
} else {
    $car = new Car($carInfo[1], $carInfo[2], $carInfo[3]);
    echo "Car created. You can now travel safely" . PHP_EOL;
    $car->start();
}