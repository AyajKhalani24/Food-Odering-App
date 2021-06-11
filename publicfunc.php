
<?php
require "starter.php";
require "navbar1.php";
require "dbconnect.php";

session_start();
$UN=$_SESSION['username'];
$sql="SELECT * FROM `public` where `username`='$UN'";
$table=mysqli_query($conn,$sql);
$raw=mysqli_fetch_assoc($table);
$city=$raw['city'];

$sql= "SELECT * FROM `restaurant` where `rcity`='$city'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

// echo '<a href="cart.php"><img src="images/cart.jpg" style="float:right; height:30px;width20px;margin-left:0px"></a>';

echo '<div class="container" style="display:flex; flex-direction:row; flex-wrap:wrap">';
while($row=mysqli_fetch_assoc($result)){
    // $row=mysqli_fetch_assoc($result);
    echo '<div class="card" style="width: 18rem; margin:10px">
    <img src="images/order.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">'.$row['rname'].'</h5>
      <p class="card-text"></p>
      <a href="explore.php?hotel='.$row['rusername'].'" class="btn btn-primary">Explore More</a>
    </div>
  </div>';
}
echo "</div>"

?>
