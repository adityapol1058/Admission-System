<?php
session_start();
include '../dbconnect.php';
if(isset($_POST['submit-btn']))
{    
      $fname = mysqli_real_escape_string($db,$_POST['First_Name']);
      
      $caste= $_POST['selectbasic'];
      $email_Id_reg = mysqli_real_escape_string($db,$_POST['Email_Id']);
      $phone_reg = mysqli_real_escape_string($db,$_POST['Mobile_Number']);
      $gender  = $_POST['gender'];
      $address = mysqli_real_escape_string($db,$_POST['Address']);
      $city =  mysqli_real_escape_string($db,$_POST['City']);
      $pin_code = mysqli_real_escape_string($db,$_POST['Pin_Code']);
      $state = mysqli_real_escape_string($db,$_POST['State']);
      $ten_board = mysqli_real_escape_string($db,$_POST['ClassX_Board']);
      $ten_per = mysqli_real_escape_string($db,$_POST['ClassX_Percentage']);
      $ten_year = mysqli_real_escape_string($db,$_POST['ClassX_YrOfPassing']);
      $twelve_board = mysqli_real_escape_string($db,$_POST['ClassXII_Board']);
      $twelve_per = mysqli_real_escape_string($db,$_POST['ClassXII_Percentage']);
      $twelve_year= mysqli_real_escape_string($db,$_POST['ClassXII_YrOfPassing']);
      $grad_board = mysqli_real_escape_string($db,$_POST['Graduation_Board']);
      $grad_per = mysqli_real_escape_string($db,$_POST['Graduation_Percentage']);
      $grad_year = mysqli_real_escape_string($db,$_POST['Graduation_YrOfPassing']);
     
      $temp = $email_Id_reg;
      $check_mail_reg = $db->query("SELECT * FROM form_registration WHERE email_id_reg = '$temp' ");
      
      $check_phone_reg = $db->query("SELECT * FROM form_registration WHERE phone_reg = '$phone_reg' ");
      
      $count_reg = $check_mail_reg->num_rows;
      $phone_count_reg = $check_phone_reg->num_rows;
      
      
                 if($count_reg==0)
                 {
                      if($phone_count_reg==0) 
                      {    
                             
                                
                                       $sql_reg = "INSERT INTO form_registration(full_name,caste,email_id_reg,phone_reg,gender,address,city,pin_code,state,ten_board,ten_per,ten_year,twelve_board,twelve_per,twelve_year,grad_board,grad_per,grad_year,status) VALUES ('$fname','$caste','$email_Id_reg','$phone_reg','$gender','$address','$city','$pin_code','$state','$ten_board','$ten_per','$ten_year','$twelve_board','$twelve_per','$twelve_year','$grad_board','$grad_per','$grad_year','')";
                                       
                                       mysqli_query($db, $sql_reg);
                                       
                                       if($sql_reg)
                                       {
                                           echo "<script>alert('Your Form Has Been Submitted Successfully')</script>";
                                       }else
                                       {
                                           echo "<script>alert('Something Went Wrong')</script>";
                                       }
                              
                      }
                      else
                      {
                          echo "<script>alert('Phone Already Exists')</script>";
                      }
                 }
                 else
                 {
                      echo "<script>alert('Email Already Exists')</script>";
                 }
              
              
              
                
}
?>


<!DOCTYPE html>
<html>
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
  <form action="index.php" method="POST" onsubmit="return validate()">
    <div class="row">
      <h4>Registration Details</h4>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Full Name" name="First_Name" id="name"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email Adress" name="Email_Id"  id="address" id="email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Contact Number" name="Mobile_Number" id="mobile"/>
        <div class="input-icon"><i class="fa fa-phone"></i></div>
      </div>
       <div class="col-md-12">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" id="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" id="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
      <div class="form-group col-md-12 control-label" style="margin-left: 0px;">
  <label class="col-md-12 control-label " for="selectbasic"><h5>Select Caste</h5></label>
  <div class="input-group input-group-icon">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="0" value=disabled>Select Options</option>
      <option value="1">Open </option>
      <option value="2">OBC</option>
      <option value="3">others</option>
    </select>
  </div>
  <div class="form-group">
    <textarea class="form-control" placeholder="Enter Address" id="exampleTextarea" name="Address" rows="6" cols="12"></textarea>
  </div>
  <div class="input-group input-group-icon">
        <input type="text" placeholder="Enter City" name="City" id="city"/>
        <div class="input-icon"><i class="fa fa-location-arrow"></i></div>
    </div>
    <div class="input-group input-group-icon">
        <input type="text" placeholder=" Pin-Code" name="Pin_Code" id="pin"/>
        <div class="input-icon"><i class="fa fa-tag "></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="State" name="State" id="state"/>
        <div class="input-icon"><i class="fa fa-university"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Country" value="India" />
        <div class="input-icon"><i class="fa fa-plane"></i></div>
      </div>
      <h3>Education Details</h4>
      <h5>Class X</h5>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Board" name="ClassX_Board" id="tenB"/>
        <div class="input-icon"><i class="fa fa-graduation-cap"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Percentage" name="ClassX_Percentage"  id="tenP"/>
        <div class="input-icon"><i class="fa fa-plus"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Year of Passing" name="ClassX_YrOfPassing" id="tenY"/>
        <div class="input-icon"><i class="fa fa-calendar-o "></i></div>
      </div>
      <h5>Class XII</h5>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Board" name="ClassXII_Board" id="twelveB"/>
        <div class="input-icon"><i class="fa fa-graduation-cap"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Percentage" name="ClassXII_Percentage"  id="twelveP"/>
        <div class="input-icon"><i class="fa fa-plus"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" id="twelveY" placeholder="Year of Passing" name="ClassXII_YrOfPassing"/>
        <div class="input-icon"><i class="fa fa-calendar-o "></i></div>
      </div>
      <h5>Graduation</h5>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Board" name="Graduation_Board" id="gradB"/>
        <div class="input-icon"><i class="fa fa-graduation-cap"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Percentage" name="Graduation_Percentage" id="gradP"/>
        <div class="input-icon"><i class="fa fa-plus" ></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Year of Passing" name="Graduation_YrOfPassing" id="gradY" />
        <div class="input-icon"><i class="fa fa-calendar-o "></i></div>
      </div>

  </div>
    </div>
    
    
    <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms" style="color: ">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>
    <input type="Submit" class="btn btn-block btn-success" name="submit-btn" value="Submit"></a>
    <br>
    <input type="reset" class="btn btn-block btn-danger" name="reset" value="Reset"></a>
  </form>
  <script>
			function validate(){
				if(document.getElementById("name").value == ""){
					alert('Name cannot be left empty');
					return false;
				}else if(document.getElementById("caste").value == ""){
					alert('Caste cannot be left empty');
					return false;
				}else if(document.getElementById("email").value == ""){
					alert('Email Cannot be left empty');
					return false;
				}else if(document.getElementById("mobile").value.length() != 10){
					alert('Incoorect Phone Number');
					return false;
				}else if(document.getElementById("pin").value.length() != 6){
					alert('Incorrect Pin Code');
					return false;
				}else if(document.getElementById("state").value == ""){
					alert('State Cannot be left empty');
					return false;
				}else if(document.getElementById("tenB").value == ""){
					alert('Board Cannot be left empty');
					return false;
				}else if(document.getElementById("tenP").value == ""){
					alert('Percentage Cannot be left empty');
					return false;
				}else if(document.getElementById("tenY").value == ""){
					alert('Year Cannot be left empty');
					return false;
				}else if(document.getElementById("twelveB").value == ""){
					alert('Board Cannot be left empty');
					return false;
				}else if(document.getElementById("twelveP").value == ""){
					alert('Percentage Cannot be left empty');
					return false;
				}else if(document.getElementById("twelveY").value == ""){
					alert('Year Cannot be left empty');
					return false;
				}else if(document.getElementById("gradB").value == ""){
					alert('Board Cannot be left empty');
					return false;
				}else if(document.getElementById("gradP").value == ""){
					alert('Percentage Cannot be left empty');
					return false;
				}else if(document.getElementById("gradY").value == ""){
					alert('Year Cannot be left empty');
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
