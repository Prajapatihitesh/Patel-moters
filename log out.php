<?php
session_start();
session_destroy();
 echo "<p><script>location.replace('Index.php');</script></p>";

?>