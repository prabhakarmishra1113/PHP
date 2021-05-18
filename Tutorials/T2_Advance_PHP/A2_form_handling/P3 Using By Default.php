<!DOCTYPE html>
<html>
<head>
</head>

<body>

  <form action="action_files/get.php"> <!--By Default Send Data In Get Method and not handle by $_POST-->
    <input type="text" name="name" placeholder="Enter Name"><br>
    <input type="email" name="email" placeholder="Enter Email"><br>
    <input type="password" name="password" placeholder="Enter Password"><br>
    <button type="submit" name="submit">Submit</button>
  </form>

<!--
 NOTE:
 1. GET Method data not handle by $_POST 
 2. POST Method data not handle by $_GET 
-->
</body>
</html>