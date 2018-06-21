<?php
  session_start();
  include_once '../dbconnect.php';
  $flag=1;
  
  if(isset($_POST['register_btn']))
  {
      $name = mysqli_real_escape_string($db,$_POST['stud_name']);
      $email = mysqli_real_escape_string($db,$_POST['stud_email']);
      $password = mysqli_real_escape_string($db,$_POST['stud_pass']);
      $password2 = mysqli_real_escape_string($db,$_POST['stud_c_pass']);
      $phone = mysqli_real_escape_string($db,$_POST['stud_phone']);
      $question = mysqli_real_escape_string($db,$_POST['selectbasic']);
      $answer  = mysqli_real_escape_string($db,$_POST['answer']);
      
      
      $tempemail = $email;
      $tempphone = $phone;
      
      $check_mail = $db->query("SELECT stud_email FROM student_registration WHERE stud_email = '$tempemail' ");
      
      $check_phone = $db->query("SELECT stud_phone FROM student_registration WHERE stud_phone = '$tempphone' ");
      
      $count = $check_mail->num_rows;
      $phone_count = $check_phone->num_rows;
      if(strlen($phone)!=10)
      {
          $flag=0;
      }
      if((strlen($password))<6)
      {
          $flag = 0;
          echo "<script>alert('Too Short Password');return false;</script>";
      }
      
              if($count==0)
              {
                      if($phone_count==0) 
                      {    
                             if($flag==1)
                              {    
                                       if($password === $password2)
                                        {
                                              $password = md5($password);
                                              $sql = "INSERT INTO student_registration(stud_name,stud_pass,stud_phone,stud_email,forgot_question,forgot_answer) VALUES ('$name','$password','$phone','$email','$question','$answer')";
                                              mysqli_query($db, $sql);
                
                                              header("location:../Login/Student_Login/index.php");
                                        }
                                        else
                                        {
                                               $_SESSION['message'] = "Two Passwords do not match";
                                        }
                              }
                      }
                      else
                      {
                                echo "<script>alert('Phone Number is already used')</script>";
                      }
            
           }
      
           else
            {
                     echo "<script>alert('Email Already Used')</script>";
            }
     
      
  }
  
 ?> 

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <form method="POST" action="index.php" onsubmit="validate()">
    <div class="row">
      <h4 style="color: rgba(230, 0, 0,0.7);">Account</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Full Name" name="stud_name" id="name"/>
        
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress" name="stud_email" id="email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="stud_pass" id="pass1"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
	  <div class="input-group input-group-icon">
        <input type="password" placeholder="Confirm Password" id="pass2" name="stud_c_pass"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Contact Number" name="stud_phone" id="phone"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="form-group col-md-12 control-label" style="margin-left: 5px;">
  <label class="col-md-12 control-label " for="selectbasic">Security question</label>
  <div class="input-group input-group-icon">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="0" value=disabled>Select Options</option>
      <option value="1">What is your mother's maiden name </option>
      <option value="2">What was your school name</option>
      <option value="3">What was you Birth Place</option>
    </select>
  </div>
  <div class="input-group input-group-icon" style="margin-top: 80px;">
        <input type="text" placeholder="Enter Answer" name="answer" id="ans1"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
    </div>
</div>
    </div>
    
    
    <div class="row">
      <h4 style="color :rgba(230, 0, 0,0.7); ">Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms" style="color: ">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>
    <input type="submit" class="btn btn-block btn-success" name="register_btn" value="Submit">
  </form>
  <script>
      function validate(){
        if(document.getElementById("name").value == ""){
          alert('Name cannot be left empty');
          return false;
        }else if(document.getElementById("email").value == ""){
          alert('Email cannot be left empty');
          return false;
        }else if(document.getElementById("phone").value.length != 10){
          alert('Enter correct Contact Numnber');
          return false;
        }else if(document.getElementById("pass1").value == ""){
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
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
