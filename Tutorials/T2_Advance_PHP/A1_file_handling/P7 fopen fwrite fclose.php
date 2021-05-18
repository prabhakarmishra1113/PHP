<?php

$myfile = fopen("files/newfile.txt","w");

$filecreated=fwrite($myfile,"Hello I Am Created");

if($filecreated){
    echo "File Created Successfully";
}

fclose($myfile);

?>