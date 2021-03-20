<?php
   $sever = "localhost";
   $username = "root";
   $password= "";
    $db = "slot-booking";

   $con = mysqli_connect($sever,$username,$password, $db );

   if(!$con){
       die("connection to the database is failed due to ".mysqli_connect_error());

   }

?>