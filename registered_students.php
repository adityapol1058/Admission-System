<?php
include 'dbconnect.php';
session_start();

$select_all = mysqli_query($db,"SELECT * FROM student_registration");
$num = $select_all->num_rows;



       


?>
<html>
    <head>
        <title>Records</title>
        <link href="homepage.css" type="text/css" rel="stylesheet">
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
    <center>
        <h1>Registered Students</h1>
        <table  border="1">
            <tr>
                <th>Student Id  </th>
                <th>Student Name  </th>
                <th>Student Phone  </th>
                <th>Student Email  </th>
            </tr>
            <?php
           
                  while ($row3=mysqli_fetch_row($select_all))
                  {
                      echo '<tr>';
                      echo '<td>   '.$row3[0].'</td>';
                      echo '<td>   '.$row3[1].'</td>';
                      echo '<td>   '.$row3[3].'</td>';
                      echo '<td>   '.$row3[4].'</td>';
                      echo '</tr>';
                  }
                     
                     
                 
            ?>
        </table>
    </center>
    </body>
</html>



