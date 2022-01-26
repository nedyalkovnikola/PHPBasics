
<?php
// Homework: PHP Flow Control Loops. 
// Problem 1.	Square Root Sum

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