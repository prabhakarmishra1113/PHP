<?php

echo date_default_timezone_get();

date_default_timezone_set("Indian/Maldives");

echo "<h5>Current Time</h5>";
echo date("h:i:s:a");

?>