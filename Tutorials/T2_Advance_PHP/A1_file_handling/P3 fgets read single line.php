<?php

$myfile = fopen("files/file1.txt","r");
echo fgets($myfile);
fclose($myfile);

?>