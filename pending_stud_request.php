<?php

include 'dbconnect.php';
session_start();



if(isset($_POST['approved_btn']))
{
        echo 'hello';
        $_SESSION['temp'] = 1;
        
        $temp_email = $_POST['email'];
        $up = "UPDATE form_registration SET status='Approved' WHERE email_id_reg = '$temp_email'"; 
        if(mysqli_query($db, $up))
        {
           $_SESSION['message1'] = "Row has been updated";
        }
        else
        {
           $_SESSION['message1'] = "Something went wrong";  
        }
}

if(isset($_POST['rejected_btn']))
{
        
        $_SESSION['temp'] = 1;
        
        $temp_email = $_POST['email'];
        $up = "UPDATE form_registration SET status='Rejected' WHERE email_id_reg = '$temp_email'"; 
        if(mysqli_query($db, $up))
        {
           $_SESSION['message1'] = "Row has been updated";
        }
        else
        {
           $_SESSION['message1'] = "Something went wrong";  
        }
}

if(isset($_POST['approve_all']))
{
        
        $_SESSION['temp'] = 1;
        
       
        $up = "UPDATE form_registration SET status='Approved' WHERE status=''"; 
        if(mysqli_query($db, $up))
        {
           $_SESSION['message1'] = "All Rows have been updated";
        }
        else
        {
           $_SESSION['message1'] = "Something went wrong";  
        }
}

if(isset($_POST['reject_all']))
{
        
        $_SESSION['temp'] = 1;
        
   
        $up = "UPDATE form_registration SET status='Rejected' WHERE status=''"; 
        if(mysqli_query($db, $up))
        {
           $_SESSION['message1'] = "All Rows have been updated";
        }
        else
        {
           $_SESSION['message1'] = "Something went wrong";  
        }
}


?>
<html>
    <head>
        <title>
            Show data
        </title>
		<style>
		table {
    border-collapse: collapse;
    width: 80%;
}
th {
    background-color: #4CAF50;
    color: white;
}
 td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
		</style>
    </head>
    <body>
        <h1>Applied Students</h1>
		<form method="POST" action="pending_stud_request.php">
		<input type="submit" name="approve_all" value="Approve All" style="color:green; margin-left:920px;">
		<input type="submit" name="reject_all" value="Reject All" style="color:red; margin-left:20px;">
        </form>
        <table  border="1">
            <tr>
                <th>Student Name </th>
                <th>10th Percentage  </th>
                <th>12th Percentage </th>
                <th>Graduation Percentage</th>
				<th colspan="2">Status</th>
            </tr>
            <?php
                  $ad = "SELECT full_name,email_id_reg,ten_per,twelve_per,grad_per FROM form_registration WHERE status = '' ";

                  $rsl = mysqli_query($db, $ad);
                  while ($r= mysqli_fetch_array($rsl))
                  {
            ?>
            <tr>
                <td><?php echo $r['full_name']?></td>
                <td><?php echo $r['ten_per']?></td>
                <td><?php echo $r['twelve_per']?></td>
                <td><?php echo $r['grad_per']?></td>
            
                <form action="pending_stud_request.php" method="POST">
                    <input type="hidden" name="email" value="<?php echo $r['email_id_reg']; ?>">
                    <td><input type="submit" name="approved_btn" value="Approve" style="color:green;"></td>
                    <td><input type="submit" name="rejected_btn" value="Reject" style="color:red;"></td>
                     
                </form>  
                    
            </tr> 
            <?php
                  }
            ?>
            
        </table>
		
        <?php
                       if(isset($_SESSION['message1']))
                       {
                           echo $_SESSION['message1'];
                           unset($_SESSION['message1']);
                       }
        ?>
    </body>
</html>