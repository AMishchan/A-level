<?php
function argCheck($num,$p1,$p2) {
   $num = trim($num);                                        //remove spaces
   $p1 = trim($p1);                                        
   $p2 = trim($p2);                                        
    if (ctype_digit($num) && ctype_digit($p1) && ctype_digit($p2)){ // check the string contains only digits
     $num = intval($num);                                    //transform in int type 
     $p1 = intval($p1);                                    
     $p2 = intval($p2);                                    
    if ($num > 0 && $p1 > 0 && $p2 > 0) {                                          //check - is variable above zero?
          $numLen = strlen(base_convert($num, 10, 2));       
          if($p1 < $numLen && $p2 < $numLen){
              return $num;
              return $p1;
              return $p2;
          }else{
              exit("p1 and p2 must be less than ".$numLen ."</br>");
          }
        } else {
        exit('number less than 0</br>');
        }
      }else{
        exit('number contains not only digits</br>');
    }
}

$handle = fopen("bin.php", "r");     // Open the input file
while (false !== ($test = fgets($handle))) {       //trace files lines
    list($num, $p1, $p2) = explode(',', trim($test));    //get variables
    argCheck($num, $p1, $p2);                      //check variables
   $num = base_convert($num, 10, 2);                //convent num in binary format
    echo ((($num >> $p1) & 1) == (($num >> $p2) & 1) ? 'true</br>': 'false</br>'); // compare with right shift
}

