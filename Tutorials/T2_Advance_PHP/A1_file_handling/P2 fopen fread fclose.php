<?php

$myfile = fopen("files/file1.txt","r");
echo fread($myfile,filesize("files/file1.txt"));
fclose($myfile);

?>