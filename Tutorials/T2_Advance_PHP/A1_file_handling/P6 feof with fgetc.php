<?php

$myfile = fopen("files/file1.txt","r");

while(!feof($myfile)){
    echo fgetc($myfile)."<br>";
}
fclose($myfile);

?>