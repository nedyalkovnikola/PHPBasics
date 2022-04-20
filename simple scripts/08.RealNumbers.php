<form method="get">
    <input type="text" name="numbers" />
    <input type="submit" value="Submit" />
</form>

<?php


// Count Real Numbers
// The script reads a list of real numbers and prints them in ascending order along with their number of occurrences.

if (isset($_GET['numbers'])) {
    $list = explode(" ", $_GET['numbers']);
    $counts = [];
    for ($i = 0; $i < count($list); $i++) {
        $num = $list[$i];
        if (isset($counts[$num])) {
            $counts[$num]++;
        } else {
            $counts[$num] = 1;
        }
    }
    ksort($counts);
    foreach ($counts as $k=>$v) {
        echo "<p>" . $k . " => " . $v . "</p>";
    }
}

?>
