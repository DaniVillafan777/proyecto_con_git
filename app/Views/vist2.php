<?php
$n = $num;
$matriz = array();
for ($i = 0; $i < $n; $i++) {
    $matriz[$i] = array();
    for ($j = 0; $j < $n; $j++) {
        if ($i == $j || $i + $j == $n - 1) {
            $matriz[$i][$j] = 0;
        } else {
            $matriz[$i][$j] = 1;
        }
    }
}
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $n; $j++)
        echo $matriz[$i][$j] . " ";
    echo "<br>";
}
?>