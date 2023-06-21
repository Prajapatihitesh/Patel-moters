<?php
 session_start();

include("connect.php");
$id =$_GET['no'];

    $sql = "delete from list_of_parts where id ='$id'";


    if(mysqli_multi_query($conn,$sql))
    {
        header("location:New_parts.php"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>