<?php
  require "starter.php";
  require "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E&R-Eat And Repeat</title>
  <style>
    h1{
      text-align:center;
      align-items:center;
      color: #2E1114;
      position: absolute;
      height: 50px;
      width: 100%;
      padding-left:400px;
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    #jj{
      text-align:center;
      align-items:center;
      color: #2E1114;
      position: absolute;
      height: 200px;
      width: 100%;
      padding-left:400px;
      padding-top:45px;
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    }
    #kk{
      text-align:center;
      align-items:center;
      color: #2E1114;
      position: absolute;
      height: 200px;
      width: 100%;
      padding-left:400px;
      padding-top:100px;
      font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
    }
    .abcd{
      z-index: 0;
      background-color:blue;
      /* opacity:1; */
    }
    .abcd::before{
      content:"";
      background: url(images/pasta-2243286_1280.jpg)no-repeat center center/cover;  
      position: absolute;
      height: 500px;
      width: 100%;
      z-index: -1;
      opacity: 1;
    }
    .cont{
      margin-top:520px;
      display:flex;
      /* flex-wrap:wrap; */
      flex-direction: row;
    }
    .flex{
      color:lightgray;
      border:2px solid #2E1114;
      border-radius:20px;
      margin-top:10px;
      margin-left:20px;
      margin-right:20px;
      padding:20px;
      background-color:black;
      /* font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
      /* font-family: 'Times New Roman', Times, serif; */
    }
  </style>
</head>
<body>
    <div class="abcd"></div>
   <h1>
   Eat & Repeat
  </h1>
  <h3 id="jj">We are here with the best food in your town.</h3>
  <h2 id="kk">Giving Your Hunger A New Option</h2>
</body>
<div class="cont">
  <div class="flex"><h3>Step-1</h3><p>Either you are public user or from restaurant you have to compulsary create account.</p>
  </div>
  <div class="flex"><h3>Step-2</h3> <small>(Only for Public User)</small><p>You can explore hotels and their delicious food after login or after creating account.</p></div>
  <div class="flex"><h3>Step-3</h3> <small>(Only for Restaurant)</small><p>You can add dish or can see your order and <strong>Terms & Condition</strong> after login or after creating account.</p></div>
</div>
<div style="border-top:1px solid lightgray; margin-top:35px;margin-bottom:0px; padding-left:100px; padding-top:20px;color:lightgray;background-color:black ">
<Strong><h3>About Us</h3></Strong>
<ol>
<strong><li>Quality of food won't be compromise.</strong></li>
  <li>Only COD payment method available for now.</li>
  <li>For any type of complaint you can contact us.</li>
  <li>For more details mail us on <strong>khalaniayaj@gmail.com</strong> </li>
  <li>Or contact us on: <a href="https://www.instagram.com/__ayaj_24"><img src="images/instamain.jpg" alt="" style="height:30px"></a>
  <a href="https://www.twitter.com/AyajKhalani"><img src="images/twittermain.jpg" alt="" style="height:30px"></a>
  </li>
</ol>

</div>
<footer style="text-align:center; margin-top:0px">
        Copyright &copy; AyajKhalani All right reserved
    </footer>
</html>


