<?php
require "starter.php";
require "navbar.php";
require "dbconnect.php";
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $dname=$_POST['dname'];
    $price=$_POST['price'];
    $disc=$_POST['disc'];
    $rusername=$_SESSION["username"];
    
    $sql="INSERT INTO `dishes` (`Sr_no`, `dname`, `price`, `disc`, `rusername`) VALUES (NULL,'$dname','$price','$disc','$rusername') ";
    mysqli_query($conn,$sql);

    header("location:restaurantfunc.php");
}
?>

<div class="container">
<form method="POST" >
  <div class="mb-3">
    <label for="dname" class="form-label">Dish Name</label>
    <input type="text" class="form-control" id="dname" name="dname">
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <div class="mb-3">
    <label for="disc" class="form-label">Discription</label>
    <input type="text" class="form-control" id="disc" name="disc">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>