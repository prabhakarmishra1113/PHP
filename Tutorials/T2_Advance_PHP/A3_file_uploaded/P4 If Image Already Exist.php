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

//Ye Origanal File Name Hai    
    $file_name = $_FILES['my_images']['name'];

//Ye Temporaray Address Hai Jaha Select Karne Per Image Upload Ho jyegi;    
    $tmp_name= $_FILES['my_images']['tmp_name'];

//Ye Wo Directory Name Hai Jaha File Upload karni hai    
    $upload_dir = 'images'.DIRECTORY_SEPARATOR;

//Ye Humne Path bana liya hai File ja Directory Aur Hmri Image Ka Naam    
    $filepath = $upload_dir.$file_name;

    if(file_exists($filepath)){
       echo "File Already Exist";
    }

    else{
        $move=move_uploaded_file($tmp_name, $filepath);
    }
}
?>
<!--
  
-->