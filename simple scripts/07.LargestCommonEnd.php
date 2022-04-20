<?php

// Largest Common End
// Read two arrays of words and find the length of the largest common end (left or right).

$firstString = "hi php java csharp sql html css";
$secondString = "hi php java js software device java learn";
$firstArr = explode(" ", $firstString);
$secondArr = explode(" ", $secondString);
$firstCount = count($firstArr);
$secondCount = count($secondArr);
$shorter = min($firstCount, $secondCount);
$leftCounter = 0;
$rightCounter = 0;

// check for common elements from left to rigth and print them
for ($i = 0; $i < $shorter; $i++) {
    if ($firstArr[$i] == $secondArr[$i]) {
        $leftCounter++;
        echo $firstArr[$i];
        echo "<br>";
    } else {
        break;
    }
}

// check from right to left
for ($i = 1; $i <= $shorter; $i++) {
    if ($firstArr[$firstCount - $i] == $secondArr[$secondCount - $i]) {
        $rightCounter++;
        echo $firstArr[$firstCount - $i];
        echo "<br>";
    } else {
        break;
    }
}

// Alternative way - using only one loop
for ($i = 0; $i < $shorter; $i++) {
    if ($firstArr[$i] == $secondArr[$i]) {
        $leftCounter++; 
    } else if ($firstArr[$firstCount - $i - 1] == $secondArr[$secondCount - $i - 1]) {
        $rightCounter++;
    } else {
        break;
    }
}

echo max($leftCounter, $rightCounter);

