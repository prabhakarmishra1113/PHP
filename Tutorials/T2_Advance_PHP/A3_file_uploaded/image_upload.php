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

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["my_images"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["my_images"]["tmp_name"]);
    if($check){
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
    } 
    else{
           echo "File is not an image.";
           $uploadOk = 0;
    }

// Check file size
if($_FILES["my_images"]["size"] > 500000){
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

//if everything is ok, try to upload file
if($uploadOk == 1){

    $file_move=move_uploaded_file($_FILES["my_images"]["tmp_name"], $target_file);

    if($file_move){
      echo "The file ". htmlspecialchars( basename( $_FILES["my_images"]["name"])). " has been uploaded.";
    }
    else{
      echo "Sorry, there was an error uploading your file.";
    }
}
//Check if $uploadOk is set to 0 by an error 
else{
      echo "Sorry, your file was not uploaded.";
  }

}
?>