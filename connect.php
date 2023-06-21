<?php 
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "patel_moters";

//create connection 
$conn = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_error())
die("connection failed :".mysqli_connect_error());
?>
