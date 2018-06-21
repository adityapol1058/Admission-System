<?php 
 session_start();
 require_once '../dbconnect.php';
 if(isset($_POST['login-btn']))
 {
     $email_id2 = mysqli_real_escape_string($db,$_POST['email_id2']);
     $password =  mysqli_real_escape_string($db,$_POST['password_2']);
     $_SESSION['email4'] = $email_id2;
     $_SESSION['pass'] = $password;
     $password = md5($password);
     $sql = "SELECT * FROM student_registration WHERE stud_email = '$email_id2' and stud_pass = '$password'";
     $result = mysqli_query($db, $sql);
     
     if(mysqli_num_rows($result) == 1)
     {
         while($row4 = mysqli_fetch_array($result))
         {
             $_SESSION['username1'] = $row4['stud_name'];
             $_SESSION['s_id'] = $row4['stud_id'];
         }
         header("location:../../Student page/index.html");
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
  <title>Student Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>Student Login</h1><span>Please Login to Continue</span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  
  <form class="login-form" action="index.php" method="POST">
    <input type="text" name="email_id2" placeholder="Email"/>
    <input type="password" name="password_2" placeholder="Password"/>
    <input type="submit" name="login-btn" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px; "/>
    <p class="message">Not registered? <a href="..\..\Register\index.php">Create an account</a></p>
    <p class="message">Forget Password <a href="../Forget_pass/index.php">click here</a></p>
  </form>
</div>
</body>
</html>
