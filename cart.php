<?php
    require "dbconnect.php";
    require "starter.php";
    require "navbar1.php";

    session_start();
    $username=$_SESSION['username'];
    $sql= "SELECT * FROM `order` WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)) {
        $dname=$row['dname'];
        $price=$row['price'];
        $rusername=$row['rusername'];

        $sql= "SELECT * FROM `restaurant` WHERE `rusername`='$rusername'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $monode=$row['monode'];

        $sql= "INSERT INTO `cart` VALUES('$dname','$price','$monode')";
        mysqli_query($conn,$sql);
    }
?>