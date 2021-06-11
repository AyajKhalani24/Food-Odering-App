</html>
<?php
session_start();
require 'dbconnect.php';
require 'starter.php';
require "navbar.php";
if (isset($_GET['signup'])) {
    $signup = $_GET['signup'];
    
}
if ($signup == 'P') {
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $fname=$_POST["fname"];
    $address=$_POST["address"];
    $mono=$_POST["mono"];
    $city=$_POST["city"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $repassword=$_POST["repassword"];
    $error=false;
    $exist=false;
    $sql="SELECT * FROM `public` WHERE `username`='{$username}'";
    $table=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($table);
    if($num==1){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">        
      <strong>Sorry!</strong> This username already exist please choose another username.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    elseif($repassword!=$password){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry!</strong> Your Passwords does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
      $hh=password_hash($password,PASSWORD_DEFAULT);
      $sql="INSERT INTO `public` (`username`, `password`,`fname`,`address`,`mono`,`city`) VALUES ('$username', '$hh','$fname','$address','$mono','$city')";
      $table=mysqli_query($conn,$sql);
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account has created successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      $_SESSION['fname']=$fname;
      $_SESSION['user']='public';
      header("location:welcome.php");
    }
  }
} 
elseif ($signup == 'HB') {
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $rname=$_POST["rname"];
    $raddress=$_POST["raddress"];
    $rmono=$_POST["rmono"];
    $monode=$_POST["monode"];
    $rcity=$_POST["rcity"];
    $rusername=$_POST["rusername"];
    $rpassword=$_POST["rpassword"];
    $rrepassword=$_POST["rrepassword"];
    $error=false;
    $exist=false;
    $sql="SELECT * FROM `restaurant` WHERE `rusername`='{$rusername}'";
    $table=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($table);
    if($num==1){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">        
      <strong>Sorry!</strong> This username already exist please choose another username.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    elseif($rrepassword!=$rpassword){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry!</strong> Your Passwords does not match.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
      $hh=password_hash($rpassword,PASSWORD_DEFAULT);
      $sql="INSERT INTO `restaurant` (`rusername`, `rpassword`,`rname`,`raddress`,`rmono`,`monode`,`rcity`) VALUES ('$rusername', '$hh','$rname','$raddress','$rmono','$monode','$rcity')";
      $table=mysqli_query($conn,$sql);
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account has created successfully.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$rusername;
      $_SESSION['fname']=$rname;
      $_SESSION['user']='restaurant';
      header("location:welcome.php");
    }
  }
}
?>

<?php
  if ($signup == 'P') {
        echo '<h2 class=text-center>Signup For Public</h2>
        
    <div class="container my-5" style="width:800px; margin:auto; ">
        <div>
            <a href="signup.php?signup=P" class="btn btn-primary " id="HB">Public</a>
            <a href="signup.php?signup=HB" class="btn btn-primary" id="P">Restaurant</a>
        </div><br>
        <form method="POST" action="signup.php?signup=P">
        <div class="mb-3">
        <label for="fname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
      </div>
    
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
      </div>
    
      <div class="mb-3">
        <label for="mono" class="form-label">Contact Number</label>
        <input type="number" class="form-control" id="mono" name="mono" required>
      </div>

      <label for="city" class="form-label">City</label>
  <br>
    
      <div class="d-flex">
      <div class="dropdown mr-1">
      <select class="btn btn-denger dropdown-toggle" id="city" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-offset="10,20" name="city" style="border:1.5px solid lightgray" required>
      
        <option class="dropdown-item" value="Ahmedabad">Ahmedabad</option>
        <option class="dropdown-item" value="Bhavnagar">Bhavnagar</option>
        <option class="dropdown-item" value="Botad">Botad</option>
        <option class="dropdown-item" value="Vadodara">Vadodara</option>
        <option class="dropdown-item" value="Surat">Surat</option>
      </select>
      </div>
    </div><br>
    
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
    
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
    
      <div class="mb-3">
        <label for="repassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="repassword" name="repassword" required>
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>';
    
    } elseif ($signup == 'HB') {
        echo ' <h2 class=text-center>Signup For Restaurant</h2>
        <div class="container my-5" style="width:800px; margin:auto; ">
        <div>
            <a href="signup.php?signup=P" class="btn btn-primary" id="HB">Public</a>
            <a href="signup.php?signup=HB" class="btn btn-primary" id="P">Restaurant</a>
        </div><br>
        <form action="signup.php?signup=HB" method="Post">
        <div class="mb-3">
    <label for="rname" class="form-label">Restaurant Name</label>
    <input type="text" class="form-control" id="rname" name="rname">
  </div>

  <div class="mb-3">
    <label for="raddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="raddress" name="raddress">
  </div>

  <div class="mb-3">
    <label for="rmono" class="form-label">Contact Number</label>
    <input type="number" class="form-control" id="rmono" name="rmono">
  </div>

  <div class="mb-3">
    <label for="monode" class="form-label">Delievery Boy Number</label>
    <input type="number" class="form-control" id="monode" name="monode">
  </div>
  <label for="rcity" class="form-label">City</label>
  <br>
  <div class="d-flex">
  
  <div class="dropdown mr-1">
  <select class="btn btn-denger dropdown-toggle" id="rcity" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" data-offset="10,20" name="rcity" style="border:1.5px solid lightgray" required>
  
    <option class="dropdown-item" value="Ahmedabad">Ahmedabad</option>
    <option class="dropdown-item" value="Bhavnagar">Bhavnagar</option>
    <option class="dropdown-item" value="Botad">Botad</option>
    <option class="dropdown-item" value="Vadodara">Vadodara</option>
    <option class="dropdown-item" value="Surat">Surat</option>
  </select>
  </div>
</div><br>

<div class="mb-3">
    <label for="rusername" class="form-label">Username</label>
    <input type="text" class="form-control" id="rusername" name="rusername">
  </div>

  <div class="mb-3">
    <label for="rpassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="rpassword" name="rpassword">
  </div>

  <div class="mb-3">
    <label for="repassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="rrepassword" name="rrepassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <?php
  ?>
</form>
</div>';
    }
    ?>

    <script type="text/javascript">
    
const name = document.getElementById('fname');
const mobile = document.getElementById('mono');
const address = document.getElementById('address');
const password = document.getElementById('password');
const cpassword = document.getElementById('repassword');
const username = document.getElementById('username');

address.addEventListener('blur', () => {
    if (address.value == "") {
        address.style.border = "1px solid #dc3545";
    }
    else {
        address.style.border = "";
    }
})

mobile.addEventListener('blur', () => {

    let regex = /^([0-9]){10}$/;
    let str = mobile.value;
    if (regex.test(str)) {
        mobile.classList.remove('is-invalid');
    }
    else {
        mobile.classList.add('is-invalid');
    }
})

name.addEventListener('blur', () => {
    let regex = /^[a-zA-Z][^0-9]+$/;
    let str = name.value;
    if (regex.test(str)) {
        name.classList.remove('is-invalid');
    }
    else {
        name.classList.add('is-invalid');
    }
})

username.addEventListener('blur', () => {
    let regex = /^{8,15}$/;
    let str = email.value;
    if (regex.test(str)) {
        email.classList.remove('is-invalid');
        
    }
    else {
        email.classList.add('is-invalid');
    }
})


password.addEventListener('blur', () => {
    let regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    let str = password.value;
    if (regex.test(str)) {
        password.classList.remove('is-invalid');
    }
    else {
        password.classList.add('is-invalid');
    }
});

cpassword.addEventListener('blur', () => {
    let regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    let str = cpassword.value;
    if (regex.test(str) && cpassword.value == password.value) {
        cpassword.classList.remove('is-invalid');
    }
    else {
        cpassword.classList.add('is-invalid');
    }
});

let signup = document.getElementById('signup');
signup.addEventListener('click', (e) => {
    let invalid = document.getElementsByClassName('is-invalid');

    if (invalid.length > 0) {
        e.preventDefault();
    }
});

</script>