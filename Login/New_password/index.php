
 <?php
 session_start();
 include '../dbconnect.php';
 if(isset($_POST['reset_btn']))
 {
  echo "hello";
     
         $pass1 = mysqli_real_escape_string($db,$_POST['pass_1']);
         $pass2 = mysqli_real_escape_string($db,$_POST['pass_2']);
         
             $r_email = $_SESSION['reset_email'];
             $pass1 = md5($pass1);
             $update = $db->query("UPDATE student_registration SET stud_pass = '$pass1' WHERE stud_email = '$r_email'");
             
             if($update)
             {
                 echo "<script>alert('Password Changed');</script>";
             }
         
         
     
 }
 
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Confirm New Password</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>Don't Panic</h1><span>Please enter the Password to Continue</span>
  </div>
</div>
<div class="form">
  
  <form class="login-form" method="POST" action="index.php">
    <input type="password" id="pass1" name="pass_1" placeholder="Enter New Password"/>
    <input type="password" id="pass2" name="pass_2" placeholder="Confirm New Password"/>
   <input type="submit" name="reset_btn" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px; " value="Proceed"/>
  
    <p class="message">Changed yet? <a href="../Student_login/index.php">Sign In</a></p>
  
  </form>
  <script>
    function validate()
    {
      if(document.getElementById("pass1").value == ""){
          alert('Password field cannot be left empty');
          return false;
        }else if(document.getElementById("pass1").value != document.getElementById("pass2").value){
          alert("Password didn't match");
          return false;
        }
        return true;
    }
  </script>
</div>
</body>
</html>
