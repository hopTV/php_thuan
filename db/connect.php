<?php
     $con = mysqli_connect("localhost","root","","web_thuan");

     if(mysqli_connect_errno()) {
          echo 'failed to connect to mysql'.mysqli_connect_errno();
     }
     mysqli_set_charset($con,"utf8");
     // mysqli_close($con);
?>