<?php

function argCheck($var) {
   $var = trim($var);                                        //remove spaces
    if (ctype_digit($var)){                                  // check the string contains only digits
     $var = intval($var);                                    //transform in int type
    if ($var > 0) {                                          //check - is variable above zero?
          return $var;
        } else {
        exit('Bad enter');
        }
      }else{
        exit('Bad enter');
    }
}

function caseOutputs($count, $f, $b) {                     //function compares values fizz, buzz 
    if ($count % $f != 0 && $count % $b != 0) {            //and print result
        echo" $count";
    }elseif ($count % $f == 0 && $count % $b == 0) {
        echo" FB";
    }elseif ($count % $f == 0) {
        echo" F";
    }elseif ($count % $b == 0) {
        echo" B";
    }
}
$handle = fopen('text.txt', 'r');           //open file with numbers
$arrNum = explode (' ', fgets($handle));    //get numbers as array

$fizz = $arrNum[0];                         //assign number to fizz
argCheck($fizz);                            //calling chech functtion, transmission as a parametr variable fizz
$buzz = $arrNum[1];
argCheck($buzz);
$dividend = $arrNum[2];
argCheck($dividend);

$i = 1;
while ($i <= $dividend) {
    caseOutputs($i, $fizz, $buzz);            // calling functions in loop 
    $i++;
}
