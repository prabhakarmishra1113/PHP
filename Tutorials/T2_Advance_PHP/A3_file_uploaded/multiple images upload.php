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
                  <input type="file" class="form-control-file" name="my_images[]" multiple>
                  <button type="submit" class="btn btn-primary mt-1" name="upload">Upload</button>
                </div>

            </form>
         </div>
      </div>
   </div>

</body>
</html>
<?php

// Check if form was submited
if(isset($_POST['upload'])) {

	// Configure upload directory and allowed file types
	$upload_dir = 'images'.DIRECTORY_SEPARATOR;
	$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
	
	// Define maxsize for files i.e 2MB
	$maxsize = 2 * 1024 * 1024;

	// Checks if user sent an empty form
	if(!empty(array_filter($_FILES['my_images']['name']))) {

		// Loop through each file in my_images[] array
		foreach ($_FILES['my_images']['tmp_name'] as $key => $value) {
			
			$file_tmpname = $_FILES['my_images']['tmp_name'][$key];
			$file_name = $_FILES['my_images']['name'][$key];
			$file_size = $_FILES['my_images']['size'][$key];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

			// Set upload file path
			$filepath = $upload_dir.$file_name;

			// Check file type is allowed or not
			if(in_array(strtolower($file_ext), $allowed_types)) {

				// Verify file size - 2MB max
				if ($file_size > $maxsize)		
					echo "Error: File size is larger than the allowed limit.";

				// If file with name already exist then append time in
				// front of name of the file to avoid overwriting of file
				if(file_exists($filepath)) {
					$filepath = $upload_dir.time().$file_name;
					
					if( move_uploaded_file($file_tmpname, $filepath)) {
						echo "{$file_name} successfully uploaded <br />";
					}
					else {					
						echo "Error uploading {$file_name} <br />";
					}
				}
				else {
				
					if( move_uploaded_file($file_tmpname, $filepath)) {
						echo "{$file_name} successfully uploaded <br />";
					}
					else {					
						echo "Error uploading {$file_name} <br />";
					}
				}
			}
			else{
				
				// If file extention not valid
				echo "Error uploading {$file_name} ";
				echo "({$file_ext} file type is not allowed)<br / >";
			}
		}
	}
	else {
		
		// If no files selected
		echo "No files selected.";
	}
}
?>
