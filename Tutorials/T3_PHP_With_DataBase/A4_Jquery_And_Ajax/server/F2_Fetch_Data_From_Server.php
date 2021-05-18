<?php

$hostname="localhost";
$user_name="root";
$password="";
$database="test";

$conn = mysqli_connect($hostname,$user_name,$password,$database);

if($conn){
    
    $query = "SELECT * FROM student";

    $result = mysqli_query($conn,$query);

    while($rows = mysqli_fetch_assoc($result)){
    ?>
       <tr>
         <td><?php echo $rows["id"]; ?></td>
         <td><?php echo $rows["name"]; ?></td>
         <td><?php echo $rows["email"]; ?></td>
       </tr>
    <?php    
    }
    

}
else{
    echo "Error";
}