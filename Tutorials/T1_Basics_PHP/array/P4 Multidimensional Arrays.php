<?php

$student = array(
               array("Name"=>"Prabhakar","Age"=>22,"Stream"=>"CSE"),
               array("Name"=>"Wahid","Age"=>23,"Stream"=>"MEC"),
               array("Name"=>"Saurabh","Age"=>24,"Stream"=>"CIVIL")
         );
    echo $student[0]['Name'].", ".$student[0]['Age'].", ".$student[0]['Stream']."<br>";
    echo $student[1]['Name'].", ".$student[1]['Age'].", ".$student[1]['Stream']."<br>";
    echo $student[2]['Name'].", ".$student[2]['Age'].", ".$student[2]['Stream']."<br>";

?>