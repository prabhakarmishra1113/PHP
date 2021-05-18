<?php include "../../src/db_con.php"; session_start(); ?>
<?php

if(isset($_REQUEST['upload']) && isset($_SESSION['seller_id'])){
   $vehicle_cat=$vehicle_subcat=$vehicle_company=$vehicle_name=$vehicle_numbe=$vehicle_model=$vehicle_fuel=$vehicle_price=$vehicle_details="";

   $vehicle_cat=$_REQUEST['vehicle_category'];
   $vehicle_subcat=$_REQUEST['vehicle_subcategory'];
   $vehicle_company=$_REQUEST['vehicle_company'];
   $vehicle_name=$_REQUEST['vehicle_name'];
   $vehicle_number=$_REQUEST['vehicle_number'];
   $vehicle_model=$_REQUEST['vehicle_model'];
   $vehicle_fuel=$_REQUEST['vehicle_fuel'];
   $vehicle_price=$_REQUEST['vehicle_price'];
   $vehicle_details=$_REQUEST['vehicle_details'];
   $seller_id=$_SESSION['seller_id'];

   $upload_dir = '../../public/images/vehicles'.DIRECTORY_SEPARATOR;
   $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
   $maxsize = 1 * 1024 * 1024;

if(!empty(array_filter($_FILES['vehicle_images']['name']))){
    foreach ($_FILES['vehicle_images']['tmp_name'] as $key => $value)
    {
        $file_tmpname = $_FILES['vehicle_images']['tmp_name'][$key];
        $file_name = $_FILES['vehicle_images']['name'][$key];
        $file_size = $_FILES['vehicle_images']['size'][$key];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        $filepath = $upload_dir.$file_name;
      if(in_array(strtolower($file_ext), $allowed_types))
      {
          if ($file_size > $maxsize){
              header("location:../../templates/views/seller_add_vehicles.php");
              $_SESSION['image_msg']="Maximum File Size 1 MB";
          }

          if(file_exists($filepath)){

					    $filepath = $upload_dir.time().$file_name;
					
				    	if($move=move_uploaded_file($file_tmpname, $filepath)){
                        $img_name=time().$file_name;
					    }
					    else{					
                header("location:../../templates/views/seller_add_vehicles.php");
                $_SESSION['image_msg']="Error Uploading File";
					    }
			    }
			    else
          {
					  if($move=move_uploaded_file($file_tmpname, $filepath)) {
              $img_name=$file_name;
					  }
					  else{					
						  header("location:../../templates/views/seller_add_vehicles.php");
              $_SESSION['image_msg']="Error Uploading File";
				  	}
				  }
      }
      else{	
        header("location:../../templates/views/seller_add_vehicles.php");
        $_SESSION['image_msg']="Only JPEG,JPG,PNG,GIF Allowed";
      }
       $temp_img[$key]=$img_name; 
     }
   }
   else{
     header("location:../../templates/views/seller_add_vehicles.php");
     $_SESSION['image_msg']="Please Image Selected";
   }

$vehicle_img=implode(",",$temp_img);

if($move){
  $query="SELECT * FROM vehicles WHERE vehicle_number='$vehicle_number' or vehicle_model='$vehicle_model'";
  $result=$con->prepare($query);
  $result->execute();
  $num=$result->rowCount();
  if($num>0)
  {
      header("location:../../templates/views/seller_add_vehicles.php");
      $_SESSION['add_vehicle_msg']="Vehicle Number Or Model Already Exist";
  }
  else
  {
    $query="INSERT INTO vehicles(vehicle_cat,vehicle_subcat,vehicle_company,vehicle_name,vehicle_images,vehicle_number,vehicle_model,vehicle_fuel,vehicle_details,vehicle_price,seller_id) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    $result=$con->prepare($query);
    $result->execute(array($vehicle_cat,$vehicle_subcat,$vehicle_company,$vehicle_name,$vehicle_img,$vehicle_number,$vehicle_model,$vehicle_fuel,$vehicle_details,$vehicle_price,$seller_id));
    if($result)
    {
       
      header("location:../../templates/views/seller_add_vehicles.php");
      $_SESSION['add_vehicle_msg']="Vehicle SuccessFully Uploaded ! Add Another Vehicle For Rent";
    }
    else
    {
       echo "Wrong data";
    }
  }
 }
}
?>
