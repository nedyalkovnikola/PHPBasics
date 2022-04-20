<form method="GET">
<input type="text" name="coords">
<input type="submit" name="submit" value="Check">
</form>

<?php

// Inside Volume
// Problem - write a function that determines whether a point is inside the volume, defined by three coordinates (x, y, z).

if (isset($_GET['coords'], $_GET['submit'])) {
    $coordinates = explode(", ", $_GET['coords']);

    function checkCoords(array $arr) {
        $x = (int)$arr[0];
        $y = (int)$arr[1];
        $z = (int)$arr[2];

        if (($x >= 10) && ($x <= 50)) {
            if (($y >= 20) && ($y <= 80)) {
                if (($z >= 15) && ($z <=50 )) {
                    return true;
                }
            }
        }
        return false;
    }

    if (checkCoords($coordinates) == true) {
        echo "Inside";
    } else {
        echo "Outside";
    }
}