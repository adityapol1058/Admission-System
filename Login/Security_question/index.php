<?php
    session_start();
    require_once '../dbconnect.php';
   if(isset($_POST['redirect_btn']))
            {
                if(isset($_POST['answer']))
                {
                    
                    $enter_answer = mysqli_real_escape_string($db,$_POST['answer']);
                    if($_SESSION['answer_1']=$enter_answer)
                    {
                        
                        header("Location:../New_password/index.php");
                    }
                    else{
                        $_SESSION['message'] = "Your answer does not match";
                    }
                }
                else
                {
                    $_SESSION['message'] = "Enter Your Answer";
                }
            }
    ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Security Question</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>Don't Panic</h1><span>Please enter the Security Answer to Continue</span>
  </div>
</div>
<div class="form">
  <?php $qstn = $_SESSION['qstn'];
  echo $qstn;?>
  <br>
  <form class="login-form" method="POST" action="index.php">
   

    <input type="text" placeholder="Security Answer" name="answer"/>

    <input type="submit" name='redirect_btn' value="Submit" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px; " />
  
  </form>
</div>
</body>
</html>
