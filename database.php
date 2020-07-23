<?php

//connect to database
$connection = mysqli_connect('localhost', 'root', '', 'slasticarna');
//check connection
if (!$connection) {
    echo 'Connection error' . mysqli_connect_error();
}

?>
