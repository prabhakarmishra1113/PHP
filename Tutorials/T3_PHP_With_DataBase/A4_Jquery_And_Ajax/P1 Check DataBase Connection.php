<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<h1>Click Blow Button And Check Connection</h1>

<button>Click Me</button>

<p id="data"></p>

<script>
$(document).ready(function(){

    $("button").click(function(){
        
        $("#data").load("server/F1_Conn.php",function(data){});

    });

});
</script>
</body>
</html>