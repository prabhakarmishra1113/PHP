<?php

$myfile = fopen("files/file1.txt","r");

while(!feof($myfile)){
    echo fgets($myfile)."<br>";
}
fclose($myfile);

?>