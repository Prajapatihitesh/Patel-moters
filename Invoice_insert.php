<?php 
	include("connect.php");
	$MEMO = $_POST['Memo'];
	$date =$_POST['date'];
  $ic =$_POST['ic'];
	$cn =$_POST['cn'];
  $vn =$_POST['vn'];
  $mod =$_POST['model'];


    $sql = "insert into invoice values(NULL,'$MEMO','$date','$ic','$cn','$vn','$mod')";

    if(mysqli_multi_query($conn,$sql)){
      echo "<script> alert('insert data successfully');location.replace('Invoice_search.php');</script></p>";
    }
    else{
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('insert data failed'); location.replace('Invoice.php');</script></p>";

    }
?>