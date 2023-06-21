<?php
include("connect.php");
$id =$_GET['no'];
$sql = "delete from invoice where invoice_no ='$id'";


    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Invoice_search.php"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>