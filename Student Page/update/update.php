<?php
session_start();
include_once '../../dbconnect.php';
$flag=1;
if(isset($_POST['update_btn']))
  {
      $sname = mysqli_real_escape_string($db,$_POST['stud_name']);
      $semail = mysqli_real_escape_string($db,$_POST['stud_email']);
      $spassword = mysqli_real_escape_string($db,$_POST['stud_pass']);
      $spassword2 = mysqli_real_escape_string($db,$_POST['stud_c_pass']);
      $sphone = mysqli_real_escape_string($db,$_POST['stud_phone']);
      $ssid = $_SESSION['s_id'];
     
      
      $check_mail1 = $db->query("SELECT stud_email FROM student_registration WHERE stud_id = '$ssid' ");
      
      $check_phone1 = $db->query("SELECT stud_phone FROM student_registration WHERE stud_id = '$ssid'");
      
      $count = $check_mail1->num_rows;
      $phone_count = $check_phone1->num_rows;
      
      if((strlen($spassword))<6)
      {
          $flag1 = 0;
           echo "<script>alert('Too Short Password');return false;</script>";
      }
      
     
              if($count==0||$count==1)
              {
                      if($phone_count==0||$phone_count==1) 
                      {    
                            if($flag==1)
                            {
                                       
                                              $spassword = md5($spassword);
                                              
                                              $ssql = "UPDATE student_registration SET stud_name='$sname',stud_email='$semail',stud_phone='$sphone',stud_pass='$spassword' WHERE stud_id = '$ssid'";
                                              mysqli_query($db, $ssql);
                                              echo "<script>alert('Profile Updated Successfuly')</script>"; 
                                              header("location:../../Login/Student_Login/index.php");
                                        
                             }          
                              
                      }
                      else
                      {
                                 echo "<script>alert('This Phone Number is already used');return false;</script>";
                      }
            
              }
      
              else
              {
                      echo "<script>alert('Too Short Password');return false;</script>";
              }
      }
     
      
  
  

?>



<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Update</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <form method="POST" action="update.php" onsubmit="validate()">
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
      
    </div>
    
    
   
    <input type="submit" class="btn btn-block btn-success" name="update_btn" value="Update">
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