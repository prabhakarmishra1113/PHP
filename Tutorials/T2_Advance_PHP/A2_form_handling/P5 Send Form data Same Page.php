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

</body>
</html>

<?php

echo "<h4>Your Form data</h4>";

if(isset($_REQUEST['submit'])){
  
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];


    echo $name."<br>";
    echo $email."<br>";
    echo $password."<br>";

}

?>
