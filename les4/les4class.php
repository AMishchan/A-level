<?php



$cars = ["bmw", "audi", "mers", "opel", "hundai", "toyota"];

function regrates($cars){
	$cars = "</br>Hello ".ucwords($cars)."! \n";
        return $cars;
}

print_r(implode(" ", array_map(regrates, $cars)));
echo"</br>";
$cars2 = ["bmw", "audi", "mers", "opel", "hundai", "toyota"];
 var_dump($cars2);
echo "</br>";

 $cars2 = array_reverse($cars2);
 echo"<pre>";
 var_dump($cars2);
 echo "</pre>";