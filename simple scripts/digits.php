<link href="style.css" rel="stylesheet">

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

// Square Root Sum
/* The script displays a table in the browser with 2 columns. 
The first column should contain a number (even numbers from 0 to 100) and the second column should contain the square root of that number, 
rounded to the second digit after the decimal point. The last row of the table should contain the sum of all values in the Square column.  */

$html = "<table><tr><td>Number</td><td>Square</td></tr>";
$results = array();
for ($row = 0; $row <= 100; $row+=2) {
    $squareroot = round(sqrt($row), 2);
    array_push($results, $squareroot);
    $html .= "<tr>";
    
    for ($col = 0; $col < 1; $col++) {
        $html .="<td>$row</td><td style='border: 1px solid black'>$squareroot</td>";
    }
    $html .= "</tr>";
}
$sum = array_sum($results);
$html .= "<tr><td>Total: </td><td>$sum</td></tr>";
$html .= '</table>';
echo $html;
?>