<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<h1>Click Blow Button And Display data</h1>

<button>Click</button>

<table class="table bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>

    <tbody id="data">
    </tbody>
</table>

<script>
$(document).ready(function(){

    $("button").click(function(){
        
        $("#data").load("server/F2_Fetch_Data_From_Server.php",function(data){});

    });

});
</script>
</body>
</html>