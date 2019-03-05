<?php
require "login_header.php";
 ?>


<main>
<h1> Signup</h1>
<form action="includes/signup.inc.php" method="post">
  <br>
<input type="text" name="uid" placeholder="Username">
  <br>
<input type="text" name="mail" placeholder="E-mail">
  <br>
<input type="password" name="pwd" placeholder="Password">
  <br>
<input type="password" name="pwd-repeat" placeholder="Repeat password">
  <br>
<button type "submit" name="signup-submit">Signup</button>

</form>

<main>
