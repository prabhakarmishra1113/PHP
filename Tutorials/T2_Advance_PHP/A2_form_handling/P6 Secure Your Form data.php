<!DOCTYPE html>
<html>
<head>
</head>

<body>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" placeholder="Enter Name"><br>
    <input type="email" name="email" placeholder="Enter Email"><br>
    <input type="password" name="password" placeholder="Enter Password"><br>
    <button type="submit" name="submit">Submit</button>
  </form>
<h3>Your Form Data</h3>
</body>
</html>

<?php

//1st Declare Yore Variable to empty;
$name=$email=$password="";

if(isset($_REQUEST['submit'])){
  
    $name=check_data($_REQUEST['name']);
    $email=check_data($_REQUEST['email']);
    $password=check_data($_REQUEST['password']);

    function check_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    echo $name."<br>";
    echo $email."<br>";
    echo $password."<br>";
}

?>
