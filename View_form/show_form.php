<?php
include 'dbconnect.php';
session_start();

$ee = $_SESSION['ee'];
$form_query = mysqli_query($db,"SELECT * FROM form_registration WHERE email_id_reg = '$ee'");
?>

<html>
    <head>
        <title>Form Application
        </title>
        <style>

            .red { color: red }
            .green { color: green }
          table{
            width:400px;
          }
        </style>
    </head>
    <body>
    <center>
        <table border=1 cellpadding="10">

          <h3>Your Form And Status</h3>

              <?php
                  while ($r=mysqli_fetch_row($form_query))
                  {
                           echo '<tr>';
                           echo '<td>    Name : </td>';
                           echo '<td>   '.$r[0].'</td>';
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>    Email : </td>';
                           echo '<td>   '.$r[2].'</td>';
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>    Contact No. : </td>';
                           echo '<td>   '.$r[3].'</td>';
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>    Gender : </td>';
                           echo '<td>   '.$r[4].'</td>';
                           echo '</tr>';

                           echo '<tr>';
                           echo '<td>    Address : </td>';
                           echo '<td>   '.$r[5].'</td>';
                           echo '</tr>';
                          
                           if($r[18] == "")
                           {
                             echo '<tr>';
                              echo '<td>    Status : </td>';
                             
                              echo '<td>  Pending </td>';
                              echo '</tr>';
                           }
                           else
                           {
                              echo '<tr>';
                              echo '<td>    Status : </td>';
                             
                              echo '<td>  '.$r[18].'</td>';
                              echo '</tr>';
                           
                           }
                           

                          

                  }
        
               ?>
       </table>
    </center>
    </body>
</html>
