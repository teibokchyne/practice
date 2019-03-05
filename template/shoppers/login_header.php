<?php
session_start();
?>
<DOCTYPE html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>

<header>
<nav>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#">Porfolio</a></li>
  <li><a href="#">About me</a></li>
  <li><a href="#"> Contact</a></li>

</ul>
</nav>

<div>

  <?php

   if(isset($_SESSION['userId'])){
     echo'<form action="includes/logout.inc.php" method="post">
      <button type ="submit" name="logout-submit">Logout</button>
     </form>';
   }
   else{
     echo'<form action="includes/login.inc.php" method="post">
      <input type="text" name="mailuid" placeholders="Username/Email"...">
     <br>
      <input type="password" name="pwd" placeholders="Password"...">
      <button type ="submit" name="login-submit">Login</button>
     </form>
     <a href="signup.php">Signup</a>';
   }
   ?>


</div>
</header>
