<form method="GET">
Number: <input type="text" name="number">
Operations: <input type="text" name="operations">
<input type="submit" name="submit" value="Cook!">
</form>

<?php

// Cooking by Numbers
// Problem - write a program that receives a number and a list of five operations. 
// Perform the operations in sequence by starting with the input number and using the result of every operation as starting point for the next. 

if (isset($_GET['number'], $_GET['operations'])) {

    $number = $_GET['number'];
    $operations = explode(", ", $_GET['operations']);

    function cookingNumbers (string $opr, int $num) {

        switch ($opr) {
            case 'chop':
                return $num / 2;

            case 'dice':
                return sqrt($num);

            case 'spice':
                return ++$num;
            
            case 'bake':
                return $num * 3;

            case 'fillet':
                return $num - (0.2 * $num);
        }

        return $num;
    }

    foreach ($operations as $opr) {
        $number = cookingNumbers($opr, $number);
        echo $number . '<br>';
    }

}

?>