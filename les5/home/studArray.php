<?php

$avg = function($value) {
    return array_sum($value) / count($value) . "\n";
};

$arr = ["Vasin" => [4, 4, 5, 2], "Sviridov" => [4, 2, 4, 3], "Petrov" => [5, 5, 3, 2], "Kirienko" => [4, 3, 4, 5], "Pupikov" => [3, 4, 5, 3]];
foreach (array_map($avg, $arr) as $key => $value) {
    echo $key . ": " . $value . "</br>";
}