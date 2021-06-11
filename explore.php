<?php
    require "starter.php";
    require "navbar1.php";
    require "dbconnect.php";
    if (isset($_GET['hotel'])) {
        $hotel = $_GET['hotel'];
        // echo $hotel;
        setcookie("username","$hotel");
    }

    $sql= "SELECT * FROM `dishes` where `rusername`='$hotel'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    echo '<div class="container" style="display:flex; flex-direction:row; flex-wrap:wrap">';

    while($row=mysqli_fetch_assoc($result)){
        // $row=mysqli_fetch_assoc($result);
        echo '<div class="card" style="width: 18rem; margin:10px">
        <img src="images/order.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h4 class="card-title">'.$row['dname'].'</h4>
          <strong>'.$row['price'].' Rs.</strong>
          <p class="card-text">'.$row['disc'].'</p>
          <a href="placeorder.php?dish='.$row['Sr_no'].'" class="btn btn-primary">Place Order</a>
        </div>
        </div>';
    }
    echo "</div>"
?>