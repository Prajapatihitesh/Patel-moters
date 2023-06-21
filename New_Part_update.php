<?php 
   include("connect.php");
    $pn =$_POST['Name'];
    $rate =$_POST['rate'];
    $C =$_POST['CGST'];
    $S =$_POST['SGST'];
    $I =$_POST['IGST'];
    $qty =$_POST['qty'];

  $sql = "update list_of_parts SET name = '$pn',Rate =$rate,CGST=$C,SGST= $S,IGST = $I,Qty =$qty where id = '$_GET[no]'";

    if(mysqli_multi_query($conn,$sql)){
      echo "<script> alert('update data successfully');location.replace('New_Parts.php');</script></p>";
    }
    else{
      echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('update data failed'); location.replace('New_Parts.php');</script></p>";

    }
?>