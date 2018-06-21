<?php
include '../dbconnect.php';
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
        <h3>Your Profile</h3>
        <table cellpadding="10" border=1>
        <?php
        while($row2 = $fquery->fetch_assoc()) 
        {
               echo '<tr>';
               echo '<td>    Student Id : </td>';
               echo '<td>   '.$row2['stud_id'].'</td>';
               echo '</tr>';

                echo '<tr>';
               echo '<td>   Student Name : </td>';
               echo '<td>   '.$row2['stud_name'].'</td>';
               echo '</tr>';

                echo '<tr>';
               echo '<td>    Student Email : </td>';
               echo '<td>   '.$row2['stud_email'].'</td>';
               echo '</tr>';

                echo '<tr>';
               echo '<td>    Student Phone : </td>';
               echo '<td>   '.$row2['stud_phone'].'</td>';
               echo '</tr>';
        
         }
        
        ?>
    </table>
    </center>
    </body>
</html>
