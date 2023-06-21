<?php
  session_start();;
if(!isset($_SESSION['username']))
{
  echo "<p><script>alert('Login failed, Invalid username or password');
  location.replace('Index.php');</script></p>";
}

 ?>
