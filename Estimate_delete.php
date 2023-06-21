<?php
include("connect.php");
$id =$_GET['no'];
$sql = "delete from estimate where estimate_no ='$id'";


    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Estimate_search.php"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>