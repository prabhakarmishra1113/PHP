<?php

$myfile = fopen("files/newfile.txt","w");

$data = "New Data Inserted";

$filecreated=fwrite($myfile,$data);

if($filecreated){
    echo "Inserted Data Successfully";
}

fclose($myfile);

?>