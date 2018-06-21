

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forget Password</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1>Don't Panic</h1><span>Please enter the Email to Continue</span>
  </div>
</div>
<div class="form">
  
  <form class="login-form" action="index.php" method="POST" onsubmit="validate()">
   <?php
          session_start();
          include '../dbconnect.php';
            if(isset($_POST['forgot_pass']))
            {        
                if(!empty($_POST['f_email']))
                {  
                      $forgot_email = $_POST['f_email'];
                      $f_query = mysqli_query($db,"SELECT * FROM student_registration WHERE stud_email = '$forgot_email'");
                      $temp = $f_query->num_rows;
                      $nnn = mysqli_fetch_array($f_query);
                      if($temp==0)
                      {
                          echo "<script>alert('Email id Does not exist');</script>";   
                          echo '<input type="text" id="mail" name="f_email" placeholder="Enter Your Email">';
                          echo '<input type="submit" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px;" name="forgot_pass" value="Submit">';      
                      }   
                      else
                      {
                            $_SESSION['reset_email'] = $forgot_email;
                            $_SESSION['answer_1'] = $nnn['forgot_answer'];
                            if($nnn['forgot_question']=='school')
                            {
                                $qstn = "What was the name of Your School?";
                                
                                $_SESSION['qstn'] = $qstn;
                                header("Location:../Security_question/index.php");
                            }
                            elseif ($nnn['forgot_question']=='mother') 
                             {
                                $qstn = "What is your Mother's maiden name?";
                                 $_SESSION['qstn'] = $qstn;
                                 header("Location:../Security_question/index.php");
                             }
                            elseif($nnn['forgot_question']=='born')
                            {
                                $qstn = "When were You Born?";
                                 $_SESSION['qstn'] = $qstn;
                                 header("Location:../Security_question/index.php");
                            }
                            
                      }
                 }
            }
            else
            {
                echo '<input type="text" id="mail" name="f_email" placeholder="Enter Your Email">';
                echo '<input type="submit" style="background-color: rgb(255, 51, 51); color: white; border-radius: 25px;" name="forgot_pass" value="Submit">';
            }   
            
            
            ?>
   
  </form>
  <script>
    function validate(){
     if(document.getElementById('mail').value==""){
      alert('Please Enter Email');
      return false;
  }}

  </script>
</div>
</body>
</html>
