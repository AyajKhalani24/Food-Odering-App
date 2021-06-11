<?php
    require "starter.php";
    require "navbar1.php";
    require "dbconnect.php";
    session_start();
    if (isset($_GET['dish'])) {
        $dish = $_GET['dish'];
        // echo $dish;
    }

    $sql= "SELECT * FROM `dishes` where `Sr_No`='$dish'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $dname=$row['dname'];
    $price=$row['price'];
    // echo $price;
    // echo $dname;

    $username=$_SESSION['username'];

    $sql= "SELECT * FROM `public` where `username`='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $fname=$row['fname'];
    // echo $fname;
    $address=$row['address'];
    // echo $address;
    $mono=$row['mono'];
    // echo $mono;
    $rusername=$_COOKIE["username"];

    $sql= "INSERT INTO `order` (`fname`, `address`, `mono`, `dname`, `price`,`rusername`,`username`) VALUES ('$fname', '$address', '$mono', '$dname', '$price','$rusername','$username')";
    mysqli_query($conn,$sql);

?>
<div class="container">
<img src="images/success.png" alt="" style="height:300px;margin-top:20px; margin-left:500px">
<h3 style="margin-left:370px; margin-top:20px"><strong>Congratulation!</strong> Your order has been placed.</h3>
<p style="margin-left:490px; margin-top:20px">Your food will be shipped within 30 minutes.</p>

<?php
require "dbconnect.php";
$username=$_COOKIE["username"];

$sql= "SELECT * FROM `restaurant` where `rusername`='$username'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$demono=$row["monode"];
echo '<p style="margin-left:525px; margin-top:20px">Delivery Boy Number:<strong>'.$demono.'</strong></p>
</div>'
?>
