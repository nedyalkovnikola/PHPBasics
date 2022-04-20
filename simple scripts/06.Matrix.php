<form method="get">
    <input type="text" name="elements" />
    <input type="submit" value="Submit" />
</form>

<?php

// Problem: Biggest and Smallest Element in Matrix
// A matrix of numbers comes as array of strings from input form
// Each string holds numbers (space separated). Number of columns should be entered by the user
// Find the biggest and smallest number

if (isset($_GET['elements'])) {
    $input = explode(",", $_GET['elements']);
    $input_count = count($input);
    $index_count = 0;
    $cols = 3;
    $rows = ceil($input_count / $cols);
    $matrix = [];

    for ($r = 0; $r < $rows; $r++) {
        $matrix[$r] = [];
        for ($c = 0; $c < $cols; $c++) {
            if ($index_count < $input_count) {
                $matrix[$r][$c] = $input[$index_count++];
            } else {
                break 2;
            }
        }
    }
    echo '<pre>';
    print_r($matrix);
    echo '</pre>';

    $biggestNumber = $matrix[0][0];
    $smallestNumber = $matrix[0][0];
    foreach ($matrix as $rows) {
        foreach ($rows as $column) {
            if ($column > $biggestNumber) {  
                $biggestNumber = $column;
            }
            if ($column < $smallestNumber) {
                $smallestNumber = $column;
            }
        }
    }
    echo $biggestNumber . '<br>';
    echo $smallestNumber;
}

?>