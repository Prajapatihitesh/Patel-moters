<?php
 include ("connect.php");
      $S_Id = $_GET['S_Id'];
      $Stock = $_GET['Stock'];

      $result = mysqli_query($conn, "SELECT  Qty FROM list_of_parts WHERE id = $S_Id");
      $row = mysqli_fetch_assoc($result);
      $Astock = $row["Qty"] + $Stock;

    $sql = "update list_of_parts SET Qty = '$Astock' where id = '$S_Id'";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('Add stock success');location.replace('New_parts.php');</script></p>";
    }
    else
    {
       echo "<script> alert('Insert failed Please Enter valid data ');location.replace('New_parts.php');</script></p>";
    }
  
 ?>