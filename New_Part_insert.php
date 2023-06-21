<?php
 include ("connect.php");
    $pn =$_POST['Name'];
    $rate =$_POST['rate'];
    $C =$_POST['CGST'];
    $S =$_POST['SGST'];
    $I =$_POST['IGST'];


    $sql = "insert into list_of_parts values(NULL,'$pn','$rate','$C','$S','$I','0')";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('success');location.replace('New_parts.php');</script></p>";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('failed');location.replace('New_parts.php');</script></p>";
    }
  
 ?>