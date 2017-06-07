<?php


$read = fopen('text.php', 'r');                            //open file for read
while (false !== ($line = fgets($read))){                  //read the lines until it runs out
    list($x, $n) = explode(',', trim($line));              //get the numbers
    $mult = $n;   
    while ($x > $n) {                                      //find the smallest multiple
        $n += $mult;
    }
    echo $n."</br>";
}