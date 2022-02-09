<form method="GET">
    <input type="text" name="number">
    <input type="submit" name="submit" value="Check">
</form>

<?php

// Modify a number until the average value of all of its digits is higher than 5. 

if (isset($_GET['number'], $_GET['submit'])) {

    $number = $_GET['number'];

    function getAverage ($num) {
        $sum = 0;
        for ($i = 0; $i <strlen($num); $i++) {
            $sum += $num[$i];
        }
        $average = $sum / strlen($num);
        return $average;
    }

    $average = getAverage($number);
    while ($average <= 5) {
        $number .= '9';
        $average = getAverage($number);
    }
    echo $number;

}

?>
