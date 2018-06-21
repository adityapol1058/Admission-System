<?php
  include '../dbconnect.php';
  session_start();
  if(isset($_POST['login-btn']))
  {  
          $check_username = NULL;
          $check_password = NULL;
           $email = $_POST["admin_email"]; 
            $password = $_POST["admin_pass"]; 
           
            $result1 = mysqli_query($db,"SELECT admin_email, admin_pass FROM admin_login WHERE admin_email = '".$email."' AND  admin_pass = '".$password."'") or die("Mar");
            
            while($row=mysqli_fetch_assoc($result1))
            {
                     $check_username=$row['admin_email'];
                     $check_password=$row['admin_pass'];
            }
 
            if($email == $check_username && $password == $check_password)
            {
                header("Location:../../Admin Page/index.php");
            }
            else
            {
                echo "<script>alert('Username or Password Incorrect')</script>";
            }
    
  }
     ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>Admin Login</h1><span>Please Login to Continue</span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  
  <form class="login-form" action="index.php" method="POST" onsubmit="validate()">
    <input type="text" placeholder="Email" required name="admin_email" id="mail"/>
    <input type="password" placeholder="Password" required name="admin_pass" id="pass"/>
    <input type="submit"  name="login-btn" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px; " />
  </form>
  
</div>
</body>
</html>


