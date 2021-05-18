<!DOCTYPE html>
<html>
<head>
</head>

<body>
 
  <form action="submit.php" method="POST" enctype="multipart/form-data">

    <textarea class="form-control" id="myckeditor" name="editor_data"></textarea>
    
    <br>
    <button type="submit">Publish</button>
  </form>


<script src="public/ckeditor.js"></script>
<script>
 CKEDITOR.replace('myckeditor',{
     filebrowserUploadMethod:'form'
 });
</script>
</body>
</html>