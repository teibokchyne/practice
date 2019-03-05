<?php

$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="login_Database";
$conn=mysqli_connect($severname,$dbusername,$dbpassword,$dbname);

if(!$conn){
  die("connection fialed:".mysqli_connect_error());
}
