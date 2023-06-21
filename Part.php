<?php
 	include("Validation.php");
	include("connect.php");
		if($_SERVER['REQUEST_METHOD'] == "GET")
			if(!empty($_GET['name'])){
		$res = mysqli_query($conn, "select rate from list_of_parts where name = '".$_GET['name']."';");
		while($row = mysqli_fetch_assoc($res)){
			echo "<option value = '".$row['rate']."'>".$row['rate']."</option>";
		}
	}
?>