<?php 
   include("connect.php");
   $INVOICE_NO = $_POST['in'];
   $MEMO = $_POST['Memo'];
   $date =$_POST['date'];
  $ic =$_POST['ic'];
   $cn =$_POST['cn'];
  $vn =$_POST['vn'];
  $mod =$_POST['model'];


    $sql = "update invoice SET INVOICE_NO = $INVOICE_NO,MEMO ='$MEMO',DATE='$date',company_name= '$ic',CUSTOMER_NAME = '$cn',VEHICLE_NO ='$vn',MODEL ='$mod' where INVOICE_NO = $INVOICE_NO";

    if(mysqli_multi_query($conn,$sql)){
      echo "<script> alert('update data successfully');location.replace('Invoice_search.php');</script></p>";
    }
    else{
      echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<script> alert('update data failed'); location.replace('Invoice.php');</script></p>";

    }
?>