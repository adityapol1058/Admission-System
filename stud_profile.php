<?php
include 'dbconnect.php';
session_start();

$em = $_SESSION['email4'];
$fquery = mysqli_query($db,"SELECT * FROM student_registration WHERE stud_email = '$em'");
if($fquery)
{
    
}else{
    echo 'COnnection Error';
}
//$row2 = mysqli_fetch_array($profile);
//$name2 = $row2['stud_name'];
//$em = $row2['stud_email'];
//$ph = $row2['stud_phone'];


  
?>

<html>
    <head>
        <title>
            Student Profile
        </title>
        <link href="login_box.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <center>
        <?php
        while($row2 = $fquery->fetch_assoc()) {
        echo "Student id : " . $row2["stud_id"]. " <br> Student Name : " . $row2["stud_name"]. "<br> Student Email : " . $row2["stud_email"]. "<br> Student Phone : ".$row2["stud_phone"];
    }
        
        ?>
    </center>
    </body>
</html>
