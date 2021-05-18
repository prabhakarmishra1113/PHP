<?php

$myfile = fopen("files/file1.txt","r");
echo fgetc($myfile);
fclose($myfile);

?>