<?php
 include ("connect.php");
 session_start();

$id =$_GET['no']; 
$id2 =$_SESSION['e_n']; 

   
$sql = "delete from invoice_labor where SR_NO ='$id'";


    
    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Invoice_labor.php?no=$id2"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
 ?>
 
