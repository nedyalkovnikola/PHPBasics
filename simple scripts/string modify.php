<!DOCTYPE html>
<html>
<link href="style.css" rel="stylesheet">
<body>


<?php
// Homework: PHP Flow Control Loops. 
// Problem 6.	Modify String

$name = $modify = $result = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $name = (empty($_GET['name'])) ? "" : $_GET['name'];
    $modify = (empty($_GET['modify'])) ? "" : $_GET['modify'];
}

if (!empty($modify)) {
    switch ($modify) {
        case 'Palindrome':
            $getReverse = strrev($name);
            $result = ($name == $getReverse) ? "{$name} is a palindrome" : "{$name} is not a palindrome";
            break;
        case 'Reverse':
            $result = strrev($name);
            break;
        case 'Split':
            $arr = str_split($name);
            $result = implode(" ", $arr);
            break;
        case 'Shuffle':
            $result = str_shuffle($name);
            break;
        default:
            $result = "Select a modifier";
    }
}

?>

<form method="get" action="<?php $_SERVER['PHP_SELF'];?>" >
    <div>
        <div class="io">Input / Output</div>
        <span><input type="text" name="name"><span class="result"><?php echo $result ?></span></span>
        <input type="radio" name="modify" value="Palindrome">Check palindrome
        <input type="radio" name="modify" value="Reverse">Reverse string
        <input type="radio" name="modify" value="Split">Split
        <input type="radio" name="modify" value="Hash">Hash string
        <input type="radio" name="modify" value="Shuffle">Shuffle string
        <input type="submit" name="submit"  value="Submit">
    </div>
</form>


</body>
</html>