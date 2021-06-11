<?php
  require "starter.php";
  require "navbar.php";
  require "dbconnect.php";

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $option=$_POST['Loginoption'];
    $password=$_POST['password'];
    $UN=$_POST['username'];
    $loggedin=false;

    if($option == "public") {
      $sql="SELECT * FROM `public` WHERE `username`='$UN'";
      $table=mysqli_query($conn,$sql);
      $raw=mysqli_fetch_assoc($table);
      $hh=$raw['password'];
      $num=mysqli_num_rows($table);
      $fname=$raw['fname'];

      if($num>=1 && password_verify($password,$hh)){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['fname']=$fname;
        $_SESSION['username']=$UN;
        $_SESSION['user']='public';
        header("location:welcome.php");
      }
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong>Please check your credintials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
    elseif($option == "restaurant"){
      $sql="SELECT * FROM `restaurant` WHERE `rusername`='$UN'";
      $table=mysqli_query($conn,$sql);
      $raw=mysqli_fetch_assoc($table);
      $hh=$raw['rpassword'];
      $rname=$raw['rname'];
      $num=mysqli_num_rows($table);

      if($num>=1 && password_verify($password,$hh)){
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['fname']=$rname;
        $_SESSION['username']=$UN;
        $_SESSION['user']='restaurant';
        header("location:welcome.php");
      }
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong>Please check your credintials.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    }
  }   
?>

<div class="container my-5" style="width:800px;margin:auto;">
  <form method="POST" action="signin.php">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="Loginoption" id="public" value="public" checked>
      <label class="form-check-label" for="public">
        For Public
      </label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="Loginoption" id="restaurant" value="restaurant">
      <label class="form-check-label" for="restaurant">
        For Restaurant
      </label>
    </div><br><br>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
        name="username" required>
    </div><br>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" autocomplete="" required>
    </div><br>
    <button type="submit" name="login" class="btn btn-primary" id="login">Login</button>
  </form>
</div>
