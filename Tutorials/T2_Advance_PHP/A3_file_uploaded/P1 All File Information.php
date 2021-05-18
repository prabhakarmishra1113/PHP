<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

   <div class="container mt-5">
      <div class="card">
         <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

               <div class="form-group col-md-6"> 
                  <input type="file" class="form-control-file" name="my_images">
                  <button type="submit" class="btn btn-primary mt-1" name="upload">Upload</button>
                </div>

            </form>
         </div>
      </div>
   </div>

</body>
</html>
<?php
if(isset($_REQUEST['upload'])){

    echo "ORIGNAL FILE NAME: ".$_FILES['my_images']['name']."<br>";

    //tmp_name ek temporary address hota hai jaha hmri file sabse phle upload ho jati hai aur bad mai 
    //yahi se orignal path mai move kra dete hai
    echo "TEMPORARY ADDRESS: ".$_FILES['my_images']['tmp_name']."<br>";

    echo "SIZE OF FILE IN BYTES: ".$_FILES['my_images']['size']."<br>";

    echo "FILE TYPE: ".$_FILES['my_images']['type']."<br>";

    echo "FILE EXTENSION: ".pathinfo($_FILES['my_images']['name'], PATHINFO_EXTENSION);

}
?>
<!--
1. $_FILES is a two dimensional associative global array;
2. tmp_name A temporary address where the file is located before processing the upload request
$_FILES[input-field-name][name]
$_FILES[input-field-name][tmp_name]
$_FILES[input-field-name][size]
$_FILES[input-field-name][type]
$_FILES[input-field-name][error]    
-->