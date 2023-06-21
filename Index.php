<?php 
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
  <link rel="stylesheet" type="text/css" href="Index.css">
</head>
<body>
 <?php include("Header.php");?>

 <div id="nbar">
      <a href="#footer">About</a>
      <a href="#" class="but" onclick="document.getElementById('frm').style.display='block'">Log In</a>
  </div>

<div id="frm" class="modal">
  
  <form name="f2" class="modal-content animate"  action="log in.php"  method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('frm').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="Login">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" id="pass" name="password" required>
       <label>
        <input type="checkbox" onclick="chk()"> Show Password
      </label>
        
      <button type="submit">Login</button>
    </div>

  </form>
</div>

<div id="wlcm">
				<h2>WELCOME TO PATEL MOTORS</h2>
        <p>All TYPE OF DIESEL & PETROL CAR VEHICLES REPAIRING</p>
</div>

<div class="news">
		<marquee behavior=scroll direction="left" scrollamount="10"> 
		<h3>WE HAVE 18 TYPES OF INSURANCE COMPANY POLICIES. All TYPE OF DIESEL & PETROL CAR VEHICLES REPAIRING</h3>
	  </marquee>
</div>

<?php include("Slider.php"); ?>

<?php include ("Footer.php"); ?>
    
  
<script>
    function chk() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>

</body>
</html>