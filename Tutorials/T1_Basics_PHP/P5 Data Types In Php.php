<?php

 //String
 $str = "Hello Bhai Ji Hum Hai String";
 echo $str."<br>";

 //Integer
 $int = 54784;
 echo $int."<br>";   
 var_dump($int); //var_dump() function returns the data type and value

 //Float
 $fl = 10.365;
 echo "<br>".$fl."<br>";
 var_dump($fl);
 echo "<br>";

//Array 
 $cars = array("Volvo","BMW","Toyota");
 var_dump($cars);
 echo "<br>";

//NULL
$a=10;
echo "Before a : = ".$a."<br>"; 
var_dump($a);
echo "<br>";

$a=null;
echo "After Null a : = ".$a; 
echo "<br>";
var_dump($a);

?>