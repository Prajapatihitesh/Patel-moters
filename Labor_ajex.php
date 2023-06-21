<?php
   include("Validation.php");
include("connect.php");
if($_SERVER['REQUEST_METHOD'] == "GET")
	if(!empty($_GET['name'])){
		$res = mysqli_query($conn, "select Rate from labor_work_list where id = '".$_GET['name']."';");
		while($row = mysqli_fetch_assoc($res)){
			echo $row['Rate'];
		}
	}
?>