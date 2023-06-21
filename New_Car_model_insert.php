<?php
 include ("connect.php");
    $cm =$_POST['Name'];
    $sql = "insert into car_model values(NULL,'$cm')";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('success');location.replace('New_Car_model.php');</script></p>";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('failed');location.replace('New_Car_model.php');</script></p>";
    }
  
 ?>