<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="card">
  <div class="card-header">Form</div>
 
  <div class="card-body">
    <form name="MyForm">
       <div class="form-row">

         <div class="form-group col-12">
           <input type="text" name="name" placeholder="Enter Name" class="form-controll" required/>
         </div>

         <div class="form-group col-12">
           <input type="email" name="email" placeholder="Enter Email" class="form-controll" required/>
         </div>

         <div class="form-group col-12">
           <input type="password" name="password" placeholder="Enter Password" class="form-controll" required/>
         </div> 

         <div class="form-group col-12">
            <button type="submit" class="btn btn-lg btn-primary" id="submitData">Submit</button>
         </div>
       </div>
    </form>
  </div>
</div>

<script>
$(document).ready(function(){

  $("button").click(function(){
  $.post("server/F3_Display_Form_data.php",
  {
    name: document.forms["MyForm"]["name"].value,
    email: document.forms["MyForm"]["email"].value,
    password: document.forms["MyForm"]["password"].value
  },
  function(data, status){
     alert(data);
  });
  return false;
});
});
</script>
</body>
</html>