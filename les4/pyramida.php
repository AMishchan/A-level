<?php

function pyramida($number) {
    $numLen = strlen(strval($number));
    for ($i = 1; $i <= $number; $i++) {
        if ($i < 10) {
            echo str_repeat("&nbsp", (($numLen*$number) - ($numLen*$i)));
            echo str_repeat("$i &nbsp ", $i) . " </br>";
        } elseif($i < 100) {
            echo str_repeat("&nbsp&nbsp", $number - $i);
            echo str_repeat("$i ", $i) . " </br>";
        }
    }
}

pyramida(99);
