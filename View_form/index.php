<?php
include 'dbconnect.php';
session_start();

if(isset($_POST['submit_btn']))
{
     $email_Id = mysqli_real_escape_string($db,$_POST['Email_Id']);
     $check =  "SELECT * FROM form_registration WHERE email_id_reg = '$email_Id'";
     $_SESSION['ee'] = $email_Id;
     $res_check = mysqli_query($db, $check);
     if($res_check->num_rows==1)
     {
         header("Location:show_form.php");
     }
     else 
     {
         echo "<script>alert('Record Not Found')</script>";
     }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>View Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>View Form</h1><span>Please enter the Email to Continue</span>
  </div>
</div>
<div class="form">
  
  <form class="login-form" method="POST" action="index.php">
    <input type="text" placeholder="Email" name="Email_Id"/>

    <input type ="submit" name="submit_btn" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px; " value="Proceed"/>
  
  </form>
</div>
</body>
</html>
