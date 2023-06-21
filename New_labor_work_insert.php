<?php
 include ("connect.php");
    $pn =$_POST['Name'];
    $rate =$_POST['rate'];
    $C =$_POST['CGST'];
    $S =$_POST['SGST'];
    $I =$_POST['IGST'];

    $sql = "insert into labor_work_list values(NULL,'$pn','$rate','$C','$S','$I')";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('success');location.replace('New_labor_work.php');</script></p>";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('failed');location.replace('Estimate.php');</script></p>";
    }
  
 ?>