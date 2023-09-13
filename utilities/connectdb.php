<?php
    $host = "localhost";
    $user = "singto";
    $pass = "abc123";
    $dbname = "pizzacompany";
    $condb = mysqli_connect($host,$user,$pass,$dbname);

    if($condb->connect_error){
        die("Connect failed" . $conn->connect_error);
    }

?>