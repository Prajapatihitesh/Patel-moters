<?php
 session_start();

include("connect.php");
$id =$_GET['no']; //which part delete by Sr no to enter part
$id2 =$_SESSION['e_n']; //estimate number by enter parts

$sql = "delete from parts where SR_NO ='$id'";


    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Estimate_parts.php?no=$id2"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>