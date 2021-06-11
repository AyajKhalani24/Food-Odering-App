<?php
require "dbconnect.php";
session_start();
$username=$_SESSION['username'];
$sql= "DELETE FROM `order` WHERE `rusername`='$username'" ;
mysqli_query($conn,$sql);
header("location:order.php");

?>