<?php
$myscores = [110, 120, 115];
echo('<pre>$myscores ' . print_r($myscores, true) . '</pre>');

$firstScore = $myscores[0];
echo "My second score was {$myscores[1]}.<br>\n";

$favs = ["fruit" => "banana", "veggie" => "carrot"];
echo('<pre>$favs ' . print_r($favs, true) . '</pre>');

$favFruit = $favs["fruit"];
echo "My favorite veggie is {$favs['veggie']}.<br>\n";
?>