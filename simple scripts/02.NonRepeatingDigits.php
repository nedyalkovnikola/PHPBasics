<?php

// Non-Repeating Digits
// The script declares an integer variable N, and then finds all 3-digit numbers that are less or equal than N (<= N) and consist of unique digits. 

$n = 650;

if ($n < 100) {
    echo 'The number is invalid' . "\n";
} else {
    $limit = ($n < 1000) ? $n : 1000;
    for ($i = 100; $i < $limit; $i++ ) {
        $string = (string)$i;
        $ones = $string[2];
        $tens = $string[1];
        $hundreds = $string[0];

        if ($ones != $tens && $ones != $hundreds && $tens != $hundreds) {
            echo $i . " ";
        }
    }
}
echo "<br>";