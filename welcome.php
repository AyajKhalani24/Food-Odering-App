<?php
include "starter.php";
require "dbconnect.php";
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["loggedin"]=!true)
{
  header("location:signin.php");
}
else{
  if($_SESSION["user"]=="public"){
    header("location:publicfunc.php");
  }
  elseif($_SESSION["user"]=="restaurant"){
    header("location:restaurantfunc.php");
  }
}
?>