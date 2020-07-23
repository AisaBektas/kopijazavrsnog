<?php
//ovo mi je header za korisnike
include('database.php');
include('bootstrap.php');
include('styleuser.css');

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="color">
<div class="w3-container">
    <nav class="navbar navbar-expand-sm fixed-top d-flex justify-content-between">
        <!--promijenila boju navbar koristeci navbar klasu-->
        <a class="navbar-brand ml-4 font-weight-bold" id="hoverheader" href="indexuser.php">&nbsp;Bektaš<br>Slastice</a>

        <a class="navbar-brand ml-4 font-weight-bold" id="hoverheader" href="indexuser.php">&nbsp;Bektaš<br>Slastice</a>
</div>
</nav>


</div>
<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>
</body>
</html>
