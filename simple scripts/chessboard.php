<link href="style.css" rel="stylesheet">
<?php

// Print a chessboard of size n. Example n=8:
$n = 8;
$html = '<div class="chessboard">';

for ($row = 0; $row < $n; $row++) {
    $html .= "<div class='row'>";
    if ($row % 2 == 0) {
        $color = 'black';
    } else {
        $color = 'white';
    }

    for ($col = 0; $col < $n; $col++) {
        $html .= "<span class=$color></span>";
        if ($color == "black") {
            $color = 'white';
        } else {
            $color = 'black';
        }
    }
    $html .="</div>";
}
$html .="</div>";
echo $html;

?>