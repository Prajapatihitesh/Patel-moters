<?php
 include ("connect.php");
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

    $sql = "insert into estimate values(NULL,'$date','$et','$cm','$vn','$mod','$doa','$toa','$ic','$pn','$poi','$poi2')";

    if(mysqli_multi_query($conn,$sql))
    {
      echo "<script> alert('Insert successfully');location.replace('Estimate_search.php');</script></p>";
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('Insert failed');location.replace('Estimate.php');</script></p>";
    }
  
 ?>