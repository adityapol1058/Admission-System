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
        <h1>Approved Students</h1>
        <table  border="1">
            <tr>
                <th>Student Name </th>
                
                <th>10th Percentage  </th>
                <th>12th Percentage </th>
                <th>Graduation Percentage</th>
            </tr>
            <?php
                  include 'dbconnect.php';
                  $ad = "SELECT full_name,email_id_reg,ten_per,twelve_per,grad_per FROM form_registration WHERE status = 'Approved' ";

                  $rsl = mysqli_query($db, $ad);
                  while ($r= mysqli_fetch_array($rsl))
                  {
            ?>
            <tr>
                <td><?php echo $r['full_name']?></td>
                <td><?php echo $r['ten_per']?></td>
                <td><?php echo $r['twelve_per']?></td>
                <td><?php echo $r['grad_per']?></td>
            </tr>
            <?php
                  }
            ?>
        </table>
    </body>
</html>