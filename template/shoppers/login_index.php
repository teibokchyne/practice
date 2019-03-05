<?php
require "login_header.php";
 ?>
<main>
  <?php
   if(isset($_SESSION['userId'])){
     echo '<p> you are logged in </p>';
   }
   else{
     echo '<p> you are logged out </p>';
   }
   ?>
<main>
