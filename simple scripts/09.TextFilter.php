<!DOCTYPE html>
<html>
<head>
    <title>Text filter</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="GET">
        <label>Text input: </label><input type="text" name="text">
        <label>Banlist: </label><input type="text" name="banlist">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

// Problem - write a program that reads a text and a string of banned words.
// All words included in the ban list should be replaced with asterisks "*", equal to the word’s length.
// The entries in the banlist will be separated by a comma and space ", ".

if (isset($_GET['text'], $_GET['banlist'])) {
    $text = $_GET['text'];
    $banlist = $_GET['banlist'];

    $banlist = explode(", ", $banlist);
    foreach ($banlist as $banword) {
        $asteriks = "";
        for ($i = 0; $i < strlen($banword); $i++) {
            $asteriks .= "*";
        }
        $text = str_replace($banword, $asteriks, $text);
    }
}
echo $text;
?>
