<?php

 $x=20;
 $y=10;

 function add(){
   
    $GLOBALS['z']=$GLOBALS['x']+$GLOBALS['y'];

 }
 add();
 
 echo $z;
?>