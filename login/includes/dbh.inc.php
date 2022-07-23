<?php
$dbservername= "localhost";
$dbusername="root";
$dbpwd="";
$dbname="loginsystem";
    $conn= mysqli_connect($dbservername,$dbusername,$dbpwd,$dbname);
    
 if (!$conn) {
    die("connection failed: " .mysqli_connect_error());
 }
 ?>