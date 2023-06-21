<?php
 include ("connect.php");

    $en =$_POST['en'];
    $date =$_POST['date'];
    $et =$_POST['et'];
    $cm =$_POST['cn'];
    $vn =$_POST['vn'];
    $mod =$_POST['car'];
    $doa =$_POST['doa'];
    $toa =$_POST['toa'];
    $ic =$_POST['ic'];
    $pn =$_POST['pn'];
    $poi =$_POST['poi'];
    $poi2 =$_POST['poi2'];

    $sql = "update estimate SET ESTIMATE_NO='$en',DATE='$date',ESTIMATE_TYPE='$et',CUST_NAME='$cm',VEHICLE_NO='$vn',MODEL='$mod',DT_OF_ACCIDENT='$doa',TIME_OF_ACCIDENT='$toa',INSURANCE_COMPANY='$ic',POLICY_NO='$pn',PERIOD_OF_INSURANCE_START='$poi',PERIOD_OF_INSURANCE_END='$poi2' WHERE ESTIMATE_NO = $en";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('Update successfully');location.replace('Estimate_search.php')</script></p>";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('Update failed');location.replace('Estimate.php');</script></p>";
    }
  
 ?>