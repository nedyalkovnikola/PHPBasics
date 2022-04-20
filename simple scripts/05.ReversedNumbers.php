<form method="get">
    <input type="text" name="elements" />
    <input type="submit" value="Submit" />
</form>

<?php

// The script reads sequence of numbers, reverses their digits, and prints their sum.

if (isset($_GET['elements'])) {
    $arr = explode(",", $_GET['elements']);
    $index_count = count($arr);
    $newarr = [];
    $sum = 0;
    for ($i = 0; $i < $index_count; $i++) {
        $reverse = strrev($arr[$i]);
        $newarr[$i] = (int)$reverse;
        $sum += (int)$reverse;
    }
    
    $sum = array_sum($newarr);
    $input = implode(" ", $arr);
    $comments = implode(" + ", $newarr);
    echo "<p> Input " . $input . "</p>";
    echo "<p> Reverse " . implode(", ", $newarr) . "</p>";
    echo "<p> Output sum " . $sum . "</p>";
    echo "<p> Comments: " . $comments . ' = ' . $sum . "</p>";
}