
<?php
$errormsg="";
$name=$email=$password="";
if(isset($_REQUEST['submit'])){

    $errormsg="";

    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];

    if(empty($name) || empty($email) || empty($password)){
        $errormsg="Fill All The Fields";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
</head>

<body>
  <span><?php echo $errormsg;  ?></span>
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

    echo $name."<br>";
    echo $email."<br>";
    echo $password."<br>";

?>
